<?php
include "../dnt-library/framework/app/Autoload.php";
$autoload		= new Autoloader();
$path			= "../";
$autoload->load($path);
$client = new Client();


$client->init();


//var_dump($client->clients);

var_dump($client->url);
var_dump($client->id);
var_dump($client->domainNP);

echo "OK";