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

if($rest->webhook(1) == "xml"){
	$api->getXmlData($query);
	$type = "xml";
}elseif($rest->webhook(1) == "json"){
	$api->getJsonData($query);
	$type = "json";
}else{
	$type = "no data";
}

//ADD LOG
$dntLog->add(
	array(
			"http_response" 	=> 200,
			"system_status" 	=> "log",		
			"msg"				=> "Api log $type - $query", 
		)
	);