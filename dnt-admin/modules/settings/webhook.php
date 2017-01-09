<?php
$rest = new Rest;
$session = new Sessions;
$dnt = new Dnt;

if($rest->get("action") == "update"){
	
}elseif($rest->get("action") == "add"){
	
}
else{
	include "tpl.php";
}