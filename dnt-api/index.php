<?php
include "../dnt-library/framework/_Class/Autoload.php";
$path			= "../";
Autoload::load($path);

$rest 			= new Rest;
$dntCache 		= new Cache;
$dntLog 		= new DntLog;
$api 			= new Api;


$query = $api->getQuery(
						$rest->webhook(2), 
						$rest->webhook(3), 
						$rest->get("query")
						);

if($query){
	if($rest->webhook(1) == "xml"){
		header('Content-type: text/xml');
		$dntCache->start();
		$api->getXmlData($query);
		$dntCache->end();
		$type = "xml";
	}elseif($rest->webhook(1) == "json"){
		header('Content-Type: application/json');
		$dntCache->start();
		$api->getJsonData($query);
		$dntCache->end();
		$type = "json";
	}else{
		$type = "no data";
	}
}else{
	$type = "no query";
}

//ADD LOG
$dntLog->add(
	array(
			"http_response" 	=> 200,
			"system_status" 	=> "log",		
			"msg"				=> "Api log $type - $query", 
		)
	);