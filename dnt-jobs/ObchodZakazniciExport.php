<?php

namespace DntJobs;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use mysqli;

class ObchodZakazniciExportJob
{

    const DB_NAME = 'addons';
    const DB_TABLE = 'obchod_zakaznici';
    const DB_TABLE_TO = 'addons.cyclone_vianoce2015';
    const STATIC_PATH = 'data/';
    const REMOTE_DB_SERVICE = 'json/forms_data';
    const REMOTE_SERVICE_HOST = 'http://tdoubek.beta.markiza.sk/';

    protected $db;
    protected $dnt;

    public function __construct()
    {
        $config['db_name'] = self::DB_NAME;
        $this->db = new DB($config);
        $this->dnt = new Dnt();
    }

    protected function minify($str)
    {

        $str = preg_replace('/\s+/', ' ', $str);
        $str = str_replace(array('\r\n', '\r', '\n', '\t'), '', $str);
        $str = trim($str);
        $str = preg_replace(
                array(
                    '/ {2,}/',
                    '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s'
                ),
                array(
                    ' ',
                    ''
                ),
                $str
        );

        $search = array(
            '/\>[^\S ]+/s', // strip whitespaces after tags, except space
            '/[^\S ]+\</s', // strip whitespaces before tags, except space
            '/(\s)+/s', // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        );
        $replace = array(
            '>',
            '<',
            '\\1',
            ''
        );
        $str = preg_replace($search, $replace, $str);
        $str = str_replace("'", '', $str);
        $str = str_replace('"', '', $str);
        //$str = htmlspecialchars($str);
        return $str;
    }

    protected function insertToDbPost($data)
    {
        $login = 'markiza';
        $password = '20Mar15kiza';
        $postFielsd = http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::REMOTE_SERVICE_HOST . self::REMOTE_DB_SERVICE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFielsd);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
        $result = curl_exec($ch);
        curl_close($ch);
        return true;
    }

    function createFormsCsv($data, $delimiter = ',', $enclosure = '"', $escape_char = "\\")
    {

        $f = fopen(self::STATIC_PATH . self::DB_TABLE_TO . '.csv', 'w+');
        foreach ($data as $item) {
            fputcsv($f, $item, $delimiter, $enclosure, $escape_char);
        }
        rewind($f);
        return stream_get_contents($f);
    }

    public function run()
    {
        ini_set('memory_limit', '256M');
        //exit;
        /* $csvAll = array_map('str_getcsv', file(self::STATIC_PATH . 'all.csv'));
          $all = [];
          foreach ($csvAll as $key => $val) {
          $all[] = $val[0];
          }

          $csvImported = array_map('str_getcsv', file(self::STATIC_PATH . 'imported.csv'));
          $imported = [];
          foreach ($csvImported as $key => $val) {
          $imported[] = $val[0];
          }


          $diff = array_diff($all, $imported);
          $createIn = join(', ', $diff);
         * */

        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, self::DB_NAME);
        $query = "SELECT * FROM " . self::DB_TABLE_TO . " WHERE 1";
        $result = $db->query($query);
        var_dump($result);
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        //exit;
        //$query = "SELECT * FROM addons.obchod_zakaznici WHERE id IN ( $createIn )";
        ///$query = "SELECT * FROM " . self::DB_TABLE_TO . " WHERE 1 LIMIT 200000";
        //$rows = $this->db->get_results($query);
        $list = [];
        foreach ($rows as $row) {


            //$data['datetime_created'] = $row['datum_rok'] . '-' . $this->dnt->dvojcifernyDatum($row['datum_mesiac']) . '-' . $this->dnt->dvojcifernyDatum($row['datum_den']) . ' ' . $row['cas'];

            $form_id = 10;

            $meno = isset($row['meno']) ? $row['meno'] : '';
            $priezvisko = isset($row['priezvisko']) ? $row['priezvisko'] : '';
            $ulica = isset($row['ulica']) ? $row['ulica'] : '';
            $c_domu = isset($row['c_domu']) ? $row['c_domu'] : '';
            $mesto = isset($row['mesto']) ? $row['mesto'] : '';
            $psc = isset($row['psc']) ? $row['psc'] : '';
            $tel_c = isset($row['telefon']) ? $row['telefon'] : '';
            $email = isset($row['email']) ? $row['email'] : '';
            $odpoved = isset($row['odpoved']) ? $row['odpoved'] : '';
            $kolo = isset($row['kolo']) ? $row['kolo'] : '';
            $suhlas1 = isset($row['suhlas1']) ? $row['suhlas1'] : '';
            $suhlas2 = isset($row['suhlas2']) ? $row['suhlas2'] : '';
            $winner = isset($row['winner']) ? $row['winner'] : '';
            $message = isset($row['message']) ? $row['message'] : '';
            $datetime_created = isset($row['datum']) ? $row['datum'] : '';

            $list[] = array(
                $data['id'] = 'null',
                $data['id_entity'] = $this->minify($row['id']),
                $data['form_id'] = $form_id,
                $data['meno'] = $meno,
                $data['priezvisko'] = $priezvisko,
                $data['ulica'] = $ulica,
                $data['c_domu'] = $c_domu,
                $data['mesto'] = $mesto,
                $data['psc'] = $psc,
                $data['telefon'] = $tel_c,
                $data['email'] = $email,
                $data['odpoved'] = $odpoved,
                $data['kolo'] = $kolo,
                $data['suhlas1'] = $suhlas1,
                $data['suhlas2'] = $suhlas2,
                $data['winner'] = $winner,
                $data['message'] = $message,
                $data['datetime_created'] = $datetime_created,
            );

            /*
              $data['id'] = 'null';
              $data['id_entity'] = $this->minify($row['id']);
              $data['form_id'] = $form_id;
              $data['meno'] = $meno;
              $data['priezvisko'] = $priezvisko;
              $data['ulica'] = $ulica;
              $data['c_domu'] = $c_domu;
              $data['mesto'] = $mesto;
              $data['psc'] = $psc;
              $data['telefon'] = $tel_c;
              $data['email'] = $email;
              $data['odpoved'] = $odpoved;
              $data['kolo'] = $kolo;
              $data['suhlas1'] = $suhlas1;
              $data['suhlas2'] = $suhlas2;
              $data['winner'] = $winner;
              $data['message'] = $message;
              $data['datetime_created'] = $datetime_created;
             * */

            //echo $row['meno'] . "<br/>";
            //$this->insertToDbPost($data);
        }
        //var_dump($list);
        $this->createFormsCsv($list);
    }

}
