<?php
//include "autoload.php";
include "dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "/";
$autoload->load($path);

$rest 			= new Rest;
$config 		= new Config;
$dntLog 		= new DntLog;
$XMLgenerator	= new XMLgenerator;
$dnt 			= new Dnt;
$dntCache 		= new Cache;


//$dntCache->start();

echo $rest->getModul();
echo "<hr/>";
echo "<hr/>";

$columns 	= "id,timestamp";
$table 		= "dnt_logs";
$downloadXlsPath 		= "dnt-system/data/test.csv";
//$XMLgenerator->creatCsvFile($table, $columns, false, $downloadXlsPath);

if($rest->getModul()){
	
	$dntLog->add(array(
			"http_response" 	=> 200,
			"system_status" 	=> "log",		
			"msg"				=> "Default Log", 
			));
			
	$rest->loadModul();
	echo $rest->getModul();
	echo $rest->webhook(0);
	
	
	echo $config->getValue("default_modul");
	
	echo "<hr>";
	echo WWW_PATH;
	echo "<hr>";
	
	if($rest->webhook(0) == "sk"){
		echo "Slovensky";
	}
	if($rest->webhook(0) == "en"){
		echo "English";
	}
}else{
	$rest->loadMyModul("default");
	$dntLog->add(array(
			"http_response" 	=> 404,
			"system_status" 	=> "log",		
			"msg"				=> "Default Log", 
			));
	
}
//$dntCache->end();
$dntCache->deleteOld();

			