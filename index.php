<?php
/**
 *  Designdnt3 Application
 *  Framework Dnt3
 *  CMS Designdnt3
 *  author: thomas.doubek@gmail.com
 * Thanks for using!
 */

 
$path		= "";
include "dnt-library/framework/app/Bootstrap.php";
$rest 		= new Rest;
$dntLog 	= new DntLog;
$dntCache 	= new Cache;
$db 		= new Db;

if (!Install::db_exists()) {
    Dnt::redirect("dnt-install/index.php");
}

$modul = new Modul();
$client->setDomain(
	$client->realUrl, 
	$client->wwwPath, 
	$client->getSetting("still_redirect_to_domain"), 
	$client->getSetting("language")
	);

$post = new Post();
$post->init();
$modul->init($client);

if ($modul->name) {
	$dntLog->add(array(
		"http_response" => 200,
		"system_status" => "web_log",
		"msg" => "Web Log 200",
	));
	
	 if (IS_CACHING && Settings::get("cachovanie") == 1) {
        $dntCache->start();
        $modul->load($client, $modul->name);
        $dntCache->end();
    } else {
        $modul->load($client, $modul->name);
	}
} else {
    $dntLog->add(array(
        "http_response" => 404,
        "system_status" => "web_log",
        "msg" => "Web Log 404",
    ));
    //$modul->load($client, "default");
}


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

/**
 * show logs
 *
 * */
if (isset($_GET['dnt_debug_mod_show_log'])) {
    $dntLog->show("last");
}

			