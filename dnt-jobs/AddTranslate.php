<?php

class AddTranslateJob {

    public function run() {

        $translates = array(
            array(
                "translate_id" => "partneri",
                "translate" => "Partneri",
            ),
            array(
                "translate_id" => "pravidla_sutaze",
                "translate" => "Pravidlá súťaže",
            ),
            array(
                "translate_id" => "socialne_siete",
                "translate" => "Sociálne siete",
            ),
        );





        $table = "dnt_translates";
        $db = new Db;
        foreach ($translates as $translate) {
            $vendor = new Vendor;
            foreach ($vendor->getAll() as $vendor) {
                $query = MultyLanguage::getLangs(true);
                if ($db->num_rows($query) > 0) {
                    foreach ($db->get_results($query) as $row) {
                        $queryTranslate = "SELECT * FROM dnt_translates WHERE translate_id = '" . $translate['translate_id'] . "' AND `vendor_id` = '" . $vendor['id'] . "'";
                        if ($db->num_rows($queryTranslate) == 0) {
                            $insertedData = array(
                                '`translate`' => $translate['translate'],
                                '`lang_id`' => $row['slug'],
                                '`translate_id`' => $translate['translate_id'],
                                '`vendor_id`' => $vendor['id'],
                                '`type`' => 'static',
                                '`table`' => '',
                                '`show`' => '1',
                                '`parent_id`' => '0',
                            );
                            $db->insert($table, $insertedData);
                            print ("<span style='color:green'>Vendor: " . $vendor['id'] . " - translate <b>" . $translate['translate'] . "</b> was added<br/></span>");
                        } else {
                            print ("<span style='color:red'>Vendor: " . $vendor['id'] . " - translate <b>" . $translate['translate'] . "</b> exists<br/></span>");
                        }
                    }
                }
            }
        }
    }

}
