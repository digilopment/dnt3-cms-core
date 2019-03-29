<?php
$time_start = microtime(true);
include "../globals.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$vendor = new Vendor;

/*
$hooks = Webhook::getSitemapModules(false, Vendor::getId());
foreach($hooks as $hook){
	var_dump($GLOBALS['DB_PROTOCOL'].$GLOBALS['DB_DOMAIN']."/".$hook);
}

var_dump($GLOBALS['DB_PROTOCOL'].$GLOBALS['DB_DOMAIN']);

exit;
*/
foreach($vendor->getAll() as $vendor){
	$defaultModule = Webhook::getSitemapModules(false, $vendor['id']);
	foreach($defaultModule as $module){
		
		$defaultUrl = HTTP_PROTOCOL.$vendor['name_url'].".".DOMAIN.WWW_FOLDERS."/".$module;
		if($vendor['show_real_url'] == 1){
			$realUrl 	= $vendor['real_url'].$module;
			file_get_contents($realUrl);
			var_dump($realUrl);
		}else{
		file_get_contents($defaultUrl);
		var_dump($defaultUrl);
		}
	}
}