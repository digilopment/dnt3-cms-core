<?php

class Autoload{
	
	public function load(){
	
	//CONFIG
	include "config.dnt";

	//CLASS
	include "dnt-library/framework/_Class/Webhook.php";
	include "dnt-library/framework/_Class/Config.php";
	include "dnt-library/framework/_Class/Cache.php";
	include "dnt-library/framework/_Class/Vendor.php";
	include "dnt-library/framework/_Class/Mail.php";
	include "dnt-library/framework/_Class/Upload.php";
	include "dnt-library/framework/_Class/ExceptionThrower.php";
	include "dnt-library/framework/_Class/Session.php";
	include "dnt-library/framework/_Class/Dnt.php";
	include "dnt-library/framework/_Class/Rest.php";
	include "dnt-library/framework/_Class/Url.php";
	include "dnt-library/framework/_Class/Db.php";
	include "dnt-library/framework/_Class/FaceDetector.php";
	include "dnt-library/framework/_Class/DntMailer.php";
	include "dnt-library/framework/_Class/DntLog.php";
	include "dnt-library/framework/_Class/XMLgenerator.php";
	}

}