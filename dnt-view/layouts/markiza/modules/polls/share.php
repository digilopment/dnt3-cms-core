<?php
include "dnt-view/layouts/markiza/tpl_functions.php";
include "dnt-view/layouts/markiza/top.php";
$rest 		= new Rest;
$db 		= new Db;
$poll_id 	= $rest->webhook(2);
$question_id= $rest->webhook(4);
$poll_input_name = "poll_".$poll_id."_".$question_id;
$catId = $rest->get("share");



echo "<br>share template BEGIN<HERE><hr/>";

echo "{<span style='font-size:12px'>id kategorie na základe ktorej sa vyberú príslušné dáta </span> <span style='color:red'>".$catId."</span>}";

echo "<hr/>share template END <HERE><br/><br/>";

include "dnt-view/layouts/markiza/bottom.php";