<?php
/*
 * => Designdnt3 Application
 * => Framework Dnt3
 * => CMS Designdnt3
 * => Skeleton template
 * => author: thomas.doubek@gmail.com
 * => Thanks for using!
*/
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

if(!Install::db_exists()){
	Dnt::redirect("dnt-install/index.php");
}

if($rest->getModul()){
	$dntLog->add(array(
		"http_response" 	=> 200,
		"system_status" 	=> "log",		
		"msg"				=> "Default Log",
	));
			
	/*
	 * IS_CACHING 				= GLOBAL Cache
	 * Settings::get("cachovanie") 	= VENDOR Cache
	 * 
	*/
	if(IS_CACHING && Settings::get("cachovanie") == 1){
		$dntCache->start();		
		$rest->loadModul();
		$dntCache->end();
	}else{
		$rest->loadModul();
	}
	
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

			