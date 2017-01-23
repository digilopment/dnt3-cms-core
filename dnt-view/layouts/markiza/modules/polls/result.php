<?php
include "dnt-view/layouts/markiza/tpl_functions.php";
include "dnt-view/layouts/markiza/top.php";
$rest 		= new Rest;
$db 		= new Db;
$poll_id 	= $rest->webhook(2);
$question_id= $rest->webhook(4);
$poll_input_name = "poll_".$poll_id."_".$question_id;

echo "<br>result<hr/>";
echo PollsFrontend::getResultPercent($poll_id);

include "dnt-view/layouts/markiza/bottom.php";