<?php
$time_start = microtime(true);
include "../globals.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$vendor = new Vendor;



foreach($vendor->getAll() as $vendor){
	$defaultModule = Webhook::getSitemapModules(false, $vendor['id']);
	foreach($defaultModule as $module){
		
		$defaultUrl = HTTP_PROTOCOL.$vendor['name_url'].".".DOMAIN.WWW_FOLDERS."/".$module;
		if($vendor['show_real_url'] == 1){
			$realUrl 	= WWW_PATH.$module;
			file_get_contents($realUrl);
		}
		file_get_contents($defaultUrl);
		var_dump($defaultUrl);
	}
}