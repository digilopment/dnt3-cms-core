<?php
//include "autoload.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);

$rest 			= new Rest;
$config 		= new Config;
$dntLog 		= new DntLog;
$XMLgenerator	= new XMLgenerator;
$dnt 			= new Dnt;
$dntCache 		= new Cache;




$api = new Api;
$query = "SELECT * FROM dnt_post_type LIMIT 11";


if($rest->webhook(1) == "xml"){
	$api->getXmlData($query);
}elseif($rest->webhook(1) == "json"){
	$api->getJsonData($query);
}

			