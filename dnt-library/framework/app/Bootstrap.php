<?php

/**
 *  class       Bootstrap
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2019
 */

include $path."globals.php";
include $path."dnt-library/framework/_Class/Autoload.php";
include $path."dnt-library/framework/app/Autoload.php";
$autoload = new Autoload;
$autoload->load($path);
if (!Install::db_exists()) {
    Dnt::redirect("dnt-install/index.php");
}
$autoloader	= new Autoloader();
$autoloader->load($path);
$client = new Client();
$client->init();

$GLOBALS['VENDOR_LAYOUT']	= $client->layout;
$GLOBALS['VENDOR_ID']		= $client->id;
$GLOBALS['WEBHOOKS'] 		= $client->routes;
define( 'WWW_PATH_LANG', WWW_PATH.$client->lang."/" ); //server path too root file usualy index.php or home.php