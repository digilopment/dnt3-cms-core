<?php
$rest = new Rest;
$session = new Sessions;
$dnt 	= new Dnt;
$db 	= new Db;

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