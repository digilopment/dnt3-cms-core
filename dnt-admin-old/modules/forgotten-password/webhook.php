<?php
$rest = new Rest;
$session = new Sessions;
$dnt = new Dnt;
$adminUser = new AdminUser;


if($rest->get('action') == "request"){
	include "request.php";
}elseif( isset($_POST['sent']) && $rest->get('action') == "confirm"){
	include "confirm-action.php";
}elseif($rest->get('action') == "confirm"){
	include "confirm.php";
}else{
	include "tpl.php";
}



