<?php

class Autoload{
	
	public function load($path){
	
	//CONFIG
	include $path."config.dnt";

	//CLASS
	include  $path."dnt-library/framework/_Class/Webhook.php";
	include  $path."dnt-library/framework/_Class/Config.php";
	include  $path."dnt-library/framework/_Class/Cache.php";
	include  $path."dnt-library/framework/_Class/Vendor.php";
	include  $path."dnt-library/framework/_Class/Mail.php";
	include  $path."dnt-library/framework/_Class/Upload.php";
	include  $path."dnt-library/framework/_Class/ExceptionThrower.php";
	include  $path."dnt-library/framework/_Class/Session.php";
	include  $path."dnt-library/framework/_Class/Dnt.php";
	include  $path."dnt-library/framework/_Class/Rest.php";
	include  $path."dnt-library/framework/_Class/Url.php";
	include  $path."dnt-library/framework/_Class/Db.php";
	include  $path."dnt-library/framework/_Class/FaceDetector.php";
	include  $path."dnt-library/framework/_Class/DntMailer.php";
	include  $path."dnt-library/framework/_Class/DntLog.php";
	include  $path."dnt-library/framework/_Class/XMLgenerator.php";
	}

}