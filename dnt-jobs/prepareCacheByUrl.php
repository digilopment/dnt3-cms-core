<?php
$time_start = microtime(true);
include "../globals.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$vendor = new Vendor;

$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: IS_JOB=1\r\n"
  )
);

$context = stream_context_create($opts);

foreach($vendor->getAll() as $vendor){
	$defaultModule = Webhook::getSitemapModules(false, $vendor['id']);
	foreach($defaultModule as $module){
		
		if($vendor['show_real_url'] == 1){
			$realUrl 	= $vendor['real_url']."/".$module;
			file_get_contents($realUrl, false, $context);
		}else{
			$defaultUrl = HTTP_PROTOCOL.$vendor['name_url'].".".DOMAIN.WWW_FOLDERS."/".$module;
			file_get_contents($defaultUrl, false, $context);
		}
	}
}