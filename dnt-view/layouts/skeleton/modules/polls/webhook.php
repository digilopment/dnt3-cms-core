<?php
$rest 		= new Rest;
$db 		= new Db;
$poll_id 	= $rest->webhook(2);
$question_id= $rest->webhook(4);
$poll_input_name = "poll_".$poll_id."_".$question_id;

//echo $rest->get("share");

//get listing
if($rest->webhook(1) && $rest->webhook(2) == false && $rest->webhook(3) == false && $rest->webhook(4) == false){
	include "list.php";
}
//get current poll
elseif($rest->webhook(1) && $rest->webhook(2) && $rest->webhook(3) && $rest->webhook(4) == false){
	PollsFrontend::deleteCookies($poll_id); //vamaz potencialne nasetované, alebo nasetovane cookies
	Dnt::redirect(PollsFrontend::url("first", $poll_id, $question_id)); //presmeruj na prvu anketovu otazku
}
elseif($rest->webhook(4) == "result" && $rest->get("share")){
	include "share.php";
}
elseif($rest->webhook(4) == "result"){
	include "result.php";
}
elseif(in_array($question_id, PollsFrontend::getPollsIds($poll_id))){
	include "tpl.php";
}
else{
	//Dnt::redirect(PollsFrontend::url("first", $poll_id, $question_id)); //presmeruj na prvu anketovu otazku
	echo "ERR";
}
