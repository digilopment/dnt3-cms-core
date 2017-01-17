<?php
$rest = new Rest;
$session = new Sessions;
$dnt 	= new Dnt;
$db 	= new Db;


if($rest->get("post_id") && $rest->get("action") == "edit")
{
	include "edit.php";
}
elseif($rest->get("post_id") && $rest->get("action") == "edit_action")
{
	//default article view action add
	include "update.php";
}
elseif($rest->get("action") == "add")
{
	//default article view action add
	include "add.php";
}
elseif($rest->get("action") == "del_mail")
{
	//default article view action add
	include "del_mail.php";
}
elseif($rest->get("action") == "edit_mail")
{
	//default article view action add
	//echo "OK";
	include "edit_mail.php";
}
else
{
	//default article list template
	include "tpl.php";
}