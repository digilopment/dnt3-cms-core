<?php

namespace DntJobs;

use App\EasyCrypt;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;

class VoyoEmailsImportJob
{

    const VOYO_SERVICE = 'https://backend.voyo.sk/lbackend/eshop/nl_sync.php';
    const SERVICE_LOGIN = 'mklepoch';
    const SERVICE_PSSWD = 'martin 650';
    const PRIVATE_KEY = 'Voyo2020MarkizaDevTem';
    const CAT_ID = 91;
    const VENDOR_ID = 39;
    const FIRST_AI_EMAIL_ID = 1207453; //vzdy prve ID vo Voyo Service
    const API_LIMIT = 5000;

    protected $dnt;
    protected $crypt;
    protected $db;
    protected $dbEmails = [];
    protected $jsonEmails = [];

    public function __construct()
    {
        $this->dnt = new Dnt();
        $this->crypt = new EasyCrypt(self::PRIVATE_KEY);
        $this->db = new DB();
    }

    protected function getData($lastId = false)
    {

        $getLastId = ($lastId) ? $lastId : self::FIRST_AI_EMAIL_ID;
        $login = self::SERVICE_LOGIN;
        $password = self::SERVICE_PSSWD;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::VOYO_SERVICE . '?lastId=' . $getLastId);
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
     * odstrani vsetky emaily ktore su starsie ako 1 rok
     */
    protected function deleteOneYearOldEmails()
    {
        $query = "DELETE FROM `dnt_mailer_mails` WHERE cat_id = '" . self::CAT_ID . "' AND vendor_id = '" . self::VENDOR_ID . "' AND datetime_creat < DATE_SUB(NOW(),INTERVAL 1 YEAR)";
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
            $this->dbEmails[] = strtolower($row['email']);
        }
    }

    /**
     * vytiahne vsetky nove emaily z API VOYA
     * data ziskava dovtedy, kym existuje nextId, respektive ak nextId vrati data, dovtedy sa oslovuje VOYO SERVICE
     */
    protected function newEmails()
    {
        $nexId = self::FIRST_AI_EMAIL_ID;
        while ($nexId > 0) {
            $data = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $this->encryptedJson($nexId)), true);
            if (count($data) > 0) {
                foreach ($data as $row) {
                    $this->jsonEmails[] = $row;
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
        $name = $item['name'];
        $surname = $item['surname'];
        $email = $item['email'];

        $insertedData = array(
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'vendor_id' => self::VENDOR_ID,
            'cat_id' => self::CAT_ID,
            'show' => 1,
            'datetime_creat' => $this->dnt->datetime(),
            'datetime_update' => $this->dnt->datetime()
        );

        //$this->db->insert('dnt_mailer_mails', $insertedData);
    }

    protected function init()
    {
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
                print ($item['id'] . ' - ' . $item['email'] . ' nie je v databaze a bol zapisany do DB<br/>');
            } else {
                print ($item['id'] . ' - ' . $item['email'] . ' EXISTUJE alebo je DUPLIKAT<br/>');
            }
        }
    }

}
