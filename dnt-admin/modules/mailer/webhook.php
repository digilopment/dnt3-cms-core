<?php
$rest = new Rest;
$session = new Sessions;
$dnt 	= new Dnt;
$db 	= new Db;

if($rest->get("action") == "add_mail") //add email
{
	include "add_mail.php";
}
elseif($rest->get("action") == "add_cat") //add cat
{
	include "add_cat.php";
}
elseif($rest->get("action") == "del_mail") //remove email
{
	include "del_mail.php";
}
elseif($rest->get("action") == "del_mail_confirm") //remove email confirm
{
	include "del_mail_confirm.php";
}
elseif($rest->get("action") == "edit_mail") //edit and update email
{
	include "edit_mail.php";
}
elseif($rest->get("action") == "sent_mail") //edit and update email
{
	include "sent_mail.php";
}
else
{
	include "tpl.php"; //default template
}