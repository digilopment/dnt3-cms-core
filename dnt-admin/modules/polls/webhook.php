<?php
$rest = new Rest;
$session = new Sessions;
$dnt = new Dnt;
$adminUser = new AdminUser;

if($rest->get("action") == "add_poll"){
	include "add_poll.php";
}
elseif($rest->get("action") == "add_poll_action"){
	include "add_poll_action.php";
}
elseif($rest->get("action") == "edit_poll"){
	include "edit_poll.php";
}
elseif($rest->get("action") == "edit_poll_action"){
	include "edit_poll_action.php";
}
elseif($rest->get("action") == "add_question"){
	include "add_question.php";
}
elseif($rest->get("action") == "del_question"){
	include "del_question.php";
}
elseif($rest->get("action") == "winning_combination"){
	include "winning_combination.php";
}
else{
	include "tpl.php";
}


