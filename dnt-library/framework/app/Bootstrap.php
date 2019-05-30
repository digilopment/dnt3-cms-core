<?php

/**
 *  class       Bootstrap
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2019
 */
 /*
class Bootstrap {
	
	public $path;
	
	public function boot($path = false){
		
		if($path){
			$this->path = $path;
		}		
	}
	
}


$bootstrap = new Bootstrap();
$bootstrap->boot($path);
$path = $bootstrap->path;
*/

include $path."globals.php";
include $path."dnt-library/framework/_Class/Autoload.php";
include $path."dnt-library/framework/app/Autoload.php";
$autoload = new Autoload;
$autoload->load($path);
$autoloader	= new Autoloader();
$autoloader->load($path);
$client = new Client();
$client->init();

$GLOBALS['VENDOR_LAYOUT']	= $client->layout;
$GLOBALS['VENDOR_ID']		= $client->id;
$GLOBALS['WEBHOOKS'] 		= $client->routes;

