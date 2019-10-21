<?php
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);

class DelJobsLogs{
	public function init(){
		$db 	= new DB();
		$where 	= array('HTTP_ACCEPT' => '*/*');
	}
}

$job = new DelJobsLogs();
$job->init();
