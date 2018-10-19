<?php
//include "autoload.php";
include "../globals.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$webhook 		= new Webhook;

$dbg = $webhook->getSitemapModules();
$dbg = $webhook->get();

var_dump($dbg);

