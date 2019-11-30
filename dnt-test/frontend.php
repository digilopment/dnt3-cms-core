<?php
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$rest = new Rest;
$dntUpload = new DntUpload;


/** 
 *
 *WORKING WITH FRONTEND DATA
 *
 *
**/
$data = Frontend::get();
echo Frontend::getMetaSetting($data, "title");
echo Frontend::getMetaTree($data, "name");


