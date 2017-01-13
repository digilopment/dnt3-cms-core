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
elseif($rest->get("id") == "add")
{
	//default article view detail
}
else
{
	//default article list template
	include "tpl.php";
}