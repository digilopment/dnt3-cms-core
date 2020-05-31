<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;

$rest = new Rest;
$session = new Sessions;
$dnt = new Dnt;
$db = new DB();

include "export.php";

/*
if($rest->get("action") == "update")
{
	include "update.php";
}
elseif($rest->get("action") == "add")
{
	//empty
}
else{
	include "tpl.php";
}
*/