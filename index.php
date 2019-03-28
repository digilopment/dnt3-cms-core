<?php
/**
 *  Designdnt3 Application
 *  Framework Dnt3
 *  CMS Designdnt3
 *  author: thomas.doubek@gmail.com
 * Thanks for using!
 */
 
include "globals.php";
include "dnt-library/framework/_Class/Autoload.php";
$autoload = new Autoload;
$path = "";
$autoload->load($path);
$rest = new Rest;
$dntLog = new DntLog;
$dntCache = new Cache;
$db = new Db;

if (!Install::db_exists()) {
    Dnt::redirect("dnt-install/index.php");
}

$rest->redirectToDomain(Settings::get("still_redirect_to_domain"));
$modul = $rest->getModul();
if ($modul) {
    $dntLog->add(array(
        "http_response" => 200,
        "system_status" => "web_log",
        "msg" => "Web Log 200",
    ));

    /**
     * IS_CACHING                       = GLOBAL Cache
     * Settings::get("cachovanie")      = VENDOR Cache
     * 
     */
    if (IS_CACHING && Settings::get("cachovanie") == 1) {
        $dntCache->start();
        $rest->loadMyModul($modul);
        $dntCache->end();
    } else {
        $rest->loadMyModul($modul);
    }
} else {
    $dntLog->add(array(
        "http_response" => 404,
        "system_status" => "web_log",
        "msg" => "Web Log 404",
    ));
    $rest->loadMyModul("default");
}

/**
 * if debug mod, then logs to csv
 *
 * */
if (DEBUG_QUERY == 1) {
    $path = "dnt-logs/" . Vendor::getId() . "/sql/" . $modul . "_query.csv";
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
                    "name" => $modul . " Modul Query ",
                    "name_url" => md5($value),
                    "query" => $value,
                    "parent_id" => 0,
                );
                Dnt::writeToFile($path, $arrToInsert, $serverVariables);
            }
        }
    }
}

/**
 * show logs
 *
 * */
if (isset($_GET['dnt_debug_mod_show_log'])) {
    $dntLog->show("last");
}

			