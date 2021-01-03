<?php

namespace DntJobs;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Vendor;

class CompetitorsExportJob
{

    public function __construct()
    {
        $this->dnt = new Dnt();
    }

    protected function creatCsvFileStatic($table, $columns, $where, $fileName, $columnsName = false)
    {
        $db = new DB();
        $data = false;
        $data = chr(0xEF) . chr(0xBB) . chr(0xBF); //diakritika pod UTF 8
        $query = "SELECT $columns FROM $table WHERE parent_id = 0 $where";
        if ($db->num_rows($query) > 0) {

            if ($columnsName) {
                $data .= str_replace(",", ";", $columnsName);
            } else {
                $data .= str_replace(" ", ";", $columns);
            }

            $data .= "\n";
            $i = 1;
            foreach ($db->get_results($query) as $row) {
                $data .= $i . ";" . $row['id_entity'] . ";" . $row['vendor_id'] . ";" . $row['name'] . ";" . $row['surname'] . ";" . $row['session_id'] . ";" . $row['mesto'] . ";" . $row['psc'] . ";" . $row['email'] . ";" . $row['tel_c'] . ";" . $row['content'] . ";" . $row['custom_1'] . ";" . $row['news'] . ";" . $row['news_2'] . ";" . $row['img'] . ";" . $row['podmienky'] . "\n";
                $i++;
            }
        }

        if (!is_readable(dirname($fileName))) {
            $this->dnt->rmkdir(dirname($fileName));
        }
        file_put_contents($fileName, $data);
    }

    public function run()
    {
        $vendor = new Vendor();
        $date_time_format = date("d") . "-" . date("m") . "-" . date("Y");

        //DEFAULT CONFIG
        $columns = "id_entity, vendor_id, name, surname, session_id, mesto, psc, email, tel_c, content, custom_1, news, news_2, img, podmienky";
        $columnsName = "order, id_entity, competition_id, meno, priezvisko, unique_id, mesto, psc, email, tel_c, odpoved, custom_1, news, news_2, fotka, podmienky";
        $table = "dnt_registred_users";

        //ALL EXPORTS
        $where = "AND status > 0";
        $fileName = "../dnt-view/data/uploads/generated-files/" . $date_time_format . "/all_competitors.csv";
        $this->creatCsvFileStatic($table, $columns, $where, $fileName, $columnsName);

        //CURRENT COMPETITOR EXPORT
        foreach ($vendor->getAll() as $row) {
            $where = "AND status > 0 AND vendor_id = '" . $row['id'] . "'";
            $fileName = "../dnt-view/data/uploads/generated-files/" . $date_time_format . "/competition_" . $row['id'] . "_competitors.csv";
            $this->creatCsvFileStatic($table, $columns, $where, $fileName, $columnsName);
        }
    }

}
