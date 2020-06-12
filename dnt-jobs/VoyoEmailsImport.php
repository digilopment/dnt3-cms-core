<?php

namespace DntJobs;

use App\EasyCrypt;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Settings;

class VoyoEmailsImportJob
{

    const CAT_ID = 91;
    const VENDOR_ID = 39;
    const API_LIMIT = 5000;
    const DELETE_PERIOD = 2;

    protected $settings;
    protected $dnt;
    protected $db;
    protected $crypt;
    protected $dbEmails = [];
    protected $jsonEmails = [];
    protected $voyoService;
    protected $serviceLogin;
    protected $servicePsswd;
    protected $decryptedKey;
    protected $firstId;

    public function __construct()
    {
        $this->settings = new Settings();
        $this->voyoService = $this->settings->getGlobals()->vendor['voyoService'];
        $this->serviceLogin = $this->settings->getGlobals()->vendor['serviceLogin'];
        $this->servicePsswd = $this->settings->getGlobals()->vendor['servicePsswd'];
        $this->decryptedKey = $this->settings->getGlobals()->vendor['decryptedKey'];
        $this->dnt = new Dnt();
        $this->db = new DB();
        $this->crypt = new EasyCrypt($this->decryptedKey);
    }

    protected function getData($lastId = false)
    {
        if ($lastId === null) {
            $url = $this->voyoService;
        } else {
            $url = $this->voyoService . '?lastId=' . $lastId;
        }
        $login = $this->serviceLogin;
        $password = $this->servicePsswd;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

    /**
     * vymaze vsetky aktivne emaily[`show` = 1] - v prípade problému ich vieme doimportovat
     */
    protected function deleteAll()
    {
        $query = "DELETE FROM `dnt_mailer_mails` WHERE cat_id = '" . self::CAT_ID . "' AND vendor_id = '" . self::VENDOR_ID . "' AND `show` = 1";
        $this->db->query($query);
    }

    /**
     * odstrani vsetky emaily ktore su starsie ako 1 a su aktivne
     * tie ktore poziadali o zrusenie z DB nemazem z dovodu udrzania informacie o neodosielani emailov
     */
    protected function deleteOneYearOldEmails()
    {
        $query = "DELETE FROM `dnt_mailer_mails` WHERE cat_id = '" . self::CAT_ID . "' AND `show` = 1 AND vendor_id = '" . self::VENDOR_ID . "' AND datetime_creat < DATE_SUB(NOW(),INTERVAL ".self::DELETE_PERIOD." YEAR)";
        $this->db->query($query);
    }

    /**
     * encryptuje data do JSON formatu
     */
    protected function encryptedJson($lastId)
    {
        $data = $this->getData($lastId);
        $json = $this->crypt->decrypt($data);
        return $json;
    }

    /**
     * vytiahne vsetky naimportovane emaily z danej kategorie 
     */
    protected function dbEmails()
    {
        $query = "SELECT email FROM `dnt_mailer_mails` WHERE cat_id = '" . self::CAT_ID . "' AND vendor_id = '" . self::VENDOR_ID . "'";
        foreach ($this->db->get_results($query) as $row) {
            $this->dbEmails[] = $row['email'];
        }
    }

    /**
     * nacita prve ID s default JSON-u
     */
    protected function initFirstId()
    {
        $data = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $this->encryptedJson(false)), true);
        if (isset($data[0]['id'])) {
            $this->firstId = (int) $data[0]['id'] - 2;
        }
    }

    /**
     * vytiahne vsetky nove emaily z API VOYA
     * data ziskava dovtedy, kym existuje nextId, respektive ak nextId vrati data, dovtedy sa oslovuje VOYO SERVICE
     */
    protected function newEmails()
    {
        $nexId = $this->firstId;
        while ($nexId > 0) {
            $data = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $this->encryptedJson($nexId)), true);
            if (count($data) > 0) {
                foreach ($data as $row) {
                    $this->jsonEmails[$row['id']] = $row;
                }
                $nexId += self::API_LIMIT;
            } else {
                $nexId = 0;
            }
        }
    }

    /**
     * 
     * zapis do databazy
     */
    protected function writeToDb($item)
    {
        $name = str_replace('?', 'c', $item['name']);
        $surname = str_replace('?', 'c', $item['surname']);
        $nickname = $item['nickname'];
        $email = $item['email'];

        $insertedData = array(
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'title' => $nickname,
            'vendor_id' => self::VENDOR_ID,
            'cat_id' => self::CAT_ID,
            '`show`' => 1,
            'datetime_creat' => $this->dnt->datetime(),
            'datetime_update' => $this->dnt->datetime()
        );
        $this->db->insert('dnt_mailer_mails', $insertedData);
    }

    protected function init()
    {
        $this->initFirstId();
        $this->deleteOneYearOldEmails();
        $this->dbEmails();
        $this->newEmails();
    }

    public function run()
    {
        $this->init();
        print('count: ' . count($this->jsonEmails) . '<br/><br/>');
        foreach ($this->jsonEmails as $item) {
            if (!in_array($item['email'], $this->dbEmails)) {
                $this->writeToDb($item);
                print ($item['id'] . ' - ' . $item['nickname'] . ' - ' . $item['email'] . ' nie je v databaze a bol zapisany do DB<br/>');
            } else {
                print ($item['id'] . ' - ' . $item['nickname'] . ' - ' . $item['email'] . ' EXISTUJE alebo je DUPLIKAT<br/>');
            }
        }
    }

}
