<?php

/**
 *  Designdnt3 Application
 *  Framework Dnt3
 *  Dnt3 MultiDomain Platform
 *  CMS Designdnt3
 *  author: Digilopment
 * 
 */

require 'dnt-library/framework/app/Bootstrap.php';
$bootstrap = new Bootstrap(__FILE__);
$bootstrap->boot();
$app = new App($bootstrap->client);
$app->run();






































/**
 * if debug mod, then logs to csv
 *
 * */
if (DEBUG_QUERY == 1) {
    $path = "dnt-logs/" . Vendor::getId() . "/sql/" . $modul->name . "_query.csv";
    if (!file_exists($path)) {
        foreach ($_SESSION as $key => $value) {
            $serverVariables = array(
                "HTTP_HOST",
                "REQUEST_TIME",
            );

            if (Dnt::in_string("debug_query", $key)) {
                $serverVariables = array();
                $value = str_replace("\n", " ", $value);
                $value = str_replace("\t", " ", $value);
                $value = str_replace("\r", " ", $value);
                $value = preg_replace('/\s\s+/', ' ', $value);
                $value = trim($value);
                $arrToInsert = array(
                    "id" => 'null',
                    "id_entity" => 0,
                    "vendor_id" => Vendor::getId(),
                    "name" => $modul->name . " Modul Query ",
                    "name_url" => md5($value),
                    "query" => $value,
                    "parent_id" => 0,
                );
                Dnt::writeToFile($path, $arrToInsert, $serverVariables);
            }
        }
    }
}

			