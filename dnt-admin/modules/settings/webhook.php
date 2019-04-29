<?php
$rest = new Rest;
$session = new Sessions;
$dnt 	= new Dnt;
$db 	= new Db;
$cache 	= new Cache;

if($rest->get("action") == "update")
{
	include "update.php";
}
elseif($rest->get("action") == "add")
{
	//empty
}
elseif($rest->get("action") == "del_cache")
{
	$originDOmain 	= $GLOBALS['ORIGIN_DOMAIN'];
	$dbDomain 		= $GLOBALS['DB_DOMAIN'];
	$cache->deleteCacheByDomain("../dnt-cache/", $originDOmain);
	$cache->deleteCacheByDomain("../dnt-cache/", $dbDomain);
	$cache->deleteCacheByDomain("../dnt-cache/", "www.".$dbDomain);
	Dnt::redirect("index.php?src=settings");
}
else{
	Settings::loadNewSettingsFromConf();
	include "tpl.php";
}