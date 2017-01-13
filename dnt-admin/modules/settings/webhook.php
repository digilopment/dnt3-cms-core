<?php
$rest = new Rest;
$session = new Sessions;
$dnt 	= new Dnt;
$db 	= new Db;

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