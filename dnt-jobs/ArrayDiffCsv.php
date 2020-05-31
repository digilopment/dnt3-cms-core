<?php

namespace DntJobs;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;

class ArrayDiffCsvJob
{

    const DB_NAME = 'addons';
    const DB_TABLE = 'obchod_zakaznici';
    const DB_TABLE_TO = 'markiza_sk_addon.cyclone_forms_2';
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

    public function run()
    {
        $csvAll = array_map('str_getcsv', file(self::STATIC_PATH . 'all.csv'));
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

        $query = "SELECT * FROM addons.obchod_zakaznici WHERE id IN ( $createIn )";
        $rows = $this->db->get_results($query);
        foreach ($rows as $row) {
            echo $row['meno'] . "<br/>";
        }
    }

}
