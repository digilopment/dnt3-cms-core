<?php
$rest = new Rest;
$dnt = new Dnt;

if($rest->get("action") == "show_hide")
{
	include "show_hide.php";
}
else
{
	include "tpl.php";
}


