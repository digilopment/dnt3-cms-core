<?php
$rest = new Rest;
$session = new Sessions;
$dnt 	= new Dnt;
$db 	= new Db;
$db = new Db;

if($rest->get("action") == "update")
{
	include "update.php";
}
elseif($rest->get("action") == "edit")
{
	include "edit.php";
}
elseif($rest->get("action") == "assign-voucher")
{
	include "assign-voucher.php";
}
elseif($rest->get("action") == "del")
{
	include "del.php";
}
elseif($rest->get("action") == "add")
{
	$query = "SELECT * FROM dnt_registred_users";
	if($db->num_rows($query) == 0){
		$insertedData["`vendor_id`"] = Vendor::getId();
		$insertedData["`type`"] = "user";
		$db->insert("dnt_registred_users", $insertedData);
	}
	include "add.php";
}
elseif($rest->get("action") == "add_data")
{
	include "add_data.php";
}
else{
	include "tpl.php";
}