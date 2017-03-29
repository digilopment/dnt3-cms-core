<?php
$rest = new Rest;
$dnt = new Dnt;

if($rest->get("action") == "show_hide")
{
	include "show_hide.php";
}
elseif($rest->get("action") == "translates")
{
	include "translates.php";
}
elseif($rest->get("search"))
{
	include "translates.php";
}
elseif($rest->get("action") == "edit")
{
	include "edit.php";
}
elseif($rest->get("action") == "update")
{
	include "update.php";
}
elseif($rest->get("action") == "del")
{
	include "del.php";
}
else{
	include "tpl.php";
}


