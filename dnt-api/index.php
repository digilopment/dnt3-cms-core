<?php
include "../globals.php";
include "../dnt-library/framework/_Class/Autoload.php";
$path			= "../";
Autoload::load($path);

$rest 			= new Rest;
$dntCache 		= new Cache;
$dntLog 		= new DntLog;
$api 			= new Api;

	
//error_reporting(E_ALL & ~E_NOTICE);

if($rest->webhook(3) == "base64"){
	$query = urldecode(str_replace("==", "", base64_decode($rest->webhook(4))));
	$query = urldecode(base64_decode($rest->get("q")));
	//var_dump($query);
}else{
	$query = $api->getQuery(
		$rest->webhook(2), 
		$rest->webhook(3), 
		$rest->get("query")
		);
}
					
$dntLog->add(
array(
		"http_response" 	=> 200,
		"system_status" 	=> "log",		
		"msg"				=> "Api log", 
	)
);

if($query){
	if($rest->webhook(1) == "xml"){
		header('Content-type: text/xml');
		//$dntCache->start();
		$api->getXmlData($query);
		//$dntCache->end();
		$type = "xml";
	}elseif($rest->webhook(1) == "json"){
		header('Content-Type: application/json');
		//$dntCache->start();
		$api->getJsonData($query);
		//$dntCache->end();
		$type = "json";
	}else{
		$type = "no data";
	}
}else{
	$type = "no query";
}

//http://skeleton.localhost/dnt3/dnt-api/xml/JajsZ5s4/1028
//http://skeleton.localhost/dnt3/dnt-api/json/?query=SELECT%20*%20FROM%20dnt_users

