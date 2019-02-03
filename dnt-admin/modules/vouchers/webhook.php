<?php
$rest = new Rest;
$session = new Sessions;
$dnt = new Dnt;

if($rest->get("action") == "add"){
	include "upload.php";
}elseif($rest->get("action") == "add-manualy"){
	include "add.php";
}
elseif($rest->get("action") == "del-all"){
	include "del-all.php";
}elseif($rest->get("action") == "del"){
	include "del.php";
}elseif($rest->get("action") == "asign"){
	include "asign.php";
}else{
	include "tpl.php";
}


