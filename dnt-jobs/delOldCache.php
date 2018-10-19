<?php
error_reporting(0);
include "../globals.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$webhook = new Webhook;
$cache 	= new Cache;
$cache->deleteOld("../dnt-cache/");
print("\nCache was deleted\n");