<?php
include "../dnt-library/framework/_Class/Autoload.php";
include "../globals.php";

$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$cache 		= new Cache;
$path 		= "../dnt-cache/";

Vendor::getId();
$originDOmain 	= $GLOBALS['ORIGIN_DOMAIN'];
$dbDomain 		= $GLOBALS['DB_DOMAIN'];
$cache->deleteCacheByDomain($path, $dbDomain);