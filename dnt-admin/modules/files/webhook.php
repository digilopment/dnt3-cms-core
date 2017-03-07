<?php
$rest = new Rest;
$session = new Sessions;
$dnt = new Dnt;
$adminUser = new AdminUser;

if($rest->get("action") == "show_hide")
{
	//default article view action add
	include "show_hide.php";
}
else{
	include "tpl.php";
}


