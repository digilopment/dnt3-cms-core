<?php
include "dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "";
$autoload->load($path);
$rest 			= new Rest;
$config 		= new Config;
$dntLog 		= new DntLog;
$XMLgenerator	= new XMLgenerator;
$dnt 			= new Dnt;
$dntCache 		= new Cache;

if($rest->getModul()){
	
	//$dntCache->start();		
	
		/*if($dntLog->is_error()){
			$dntLog->add(array(
				"http_response" 	=> 500,
				"system_status" 	=> "log",		
				"msg"				=> "Error Log",
			));
		}else{
			$dntLog->add(array(
				"http_response" 	=> 200,
				"system_status" 	=> "log",		
				"msg"				=> "Default Log",
			));
		}*/
		$rest->loadModul();
	//$dntCache->end();
	
}else{
	
	$dntLog->add(array(
			"http_response" 	=> 404,
			"system_status" 	=> "log",		
			"msg"				=> "Default Log", 
			));
	$rest->loadMyModul("default");
	
}

if(isset($_GET['dnt_debug_mod_show_log'])){
	$dntLog->show("last");
}

			