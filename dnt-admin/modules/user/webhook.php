<?php
$rest = new Rest;
$session = new Sessions;
$dnt 	= new Dnt;
$db 	= new Db;

if($rest->get("action") == "update")
{
	include "update.php";
}
elseif($rest->get("action") == "edit")
{
	include "edit.php";
}
elseif($rest->get("action") == "add")
{
	include "add.php";
}
elseif($rest->get("action") == "add_data")
{
	include "add_data.php";
}
else{
	include "tpl.php";
}