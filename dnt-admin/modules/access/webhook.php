<?php
$rest = new Rest;
$session = new Sessions;
$dnt = new Dnt;
$adminUser = new AdminUser;

if($rest->get("action") == "edit")
{
	include "edit.php";
}
elseif($rest->get("action") == "update")
{
	include "update.php";
}
else
{
	include "tpl.php";
}


