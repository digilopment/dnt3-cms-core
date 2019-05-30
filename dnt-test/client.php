<?php
include "../dnt-library/framework/app/Autoload.php";
$autoload		= new Autoloader();
$path			= "../";
$autoload->load($path);

$client = new Client();
$modul = new Modul();
$client->init();
$client->setDomain("https://www.skeletonis.localhost/dnt3/", true);


$modul->get($client);

exit;
class Template {
	public function data($client){
		$client->init();
		var_dump($client->url);
		var_dump($client->id);
		var_dump($client->domainNP);
	}
}

$tpl = new Template();
$tpl->data($client);
$tpl->data($client); //load inited data
$tpl->data($client); //load inited data

echo "<hr/>";