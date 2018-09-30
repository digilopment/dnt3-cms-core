<?php
/**
 *  Designdnt3 Application
 *  Framework Dnt3
 *  CMS Designdnt3
 *  keleton template
 *  author: thomas.doubek@gmail.com
 * Thanks for using!
 */

include "dnt-library/framework/_Class/Autoload.php";
$autoload       = new Autoload;
$path           = "";
$autoload->load($path);
$rest           = new Rest;
$dntLog         = new DntLog;
$dntCache       = new Cache;

if (!Install::db_exists()) {
    Dnt::redirect("dnt-install/index.php");
}

$modul = $rest->getModul();
if ($modul) {
    $dntLog->add(array(
        "http_response" => 200,
        "system_status" => "log",
        "msg"           => "Default Log",
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
        "system_status" => "log",
        "msg"           => "Default Log",
    ));
    $rest->loadMyModul("default");
}


if(DEBUG_QUERY == 1){
	$path = "dnt-view/data/uploads/sql_logs/".$modul."_query.csv";
	if(!file_exists($path)){
		foreach($_SESSION as $key => $value){
			$serverVariables = array(
				"HTTP_HOST",
				"REQUEST_TIME",
			);
			
			$value = str_replace("\n", "", $value);
			$value = str_replace("\t", "", $value);
			$value = str_replace("\r", "", $value);
			$arrToInsert = array(
				"key" => $key,
				"query" => $value,
			);
			Dnt::writeToFile($path, $arrToInsert, $serverVariables);
		}
	}
}

if (isset($_GET['dnt_debug_mod_show_log'])) {
    $dntLog->show("last");
}

			