<?php
$rest 		= new Rest;
$db 		= new Db;
$poll_id 	= $rest->webhook(2);
$question_id= $rest->webhook(4);
$poll_input_name = "poll_".$poll_id."_".$question_id;

//echo $rest->get("share");

include "tpl.php";
