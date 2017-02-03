<?php
//include TEMPLATE top
include "dnt-view/layouts/markiza/tpl_functions.php";
include "dnt-view/layouts/markiza/top.php";



$rest 		= new Rest;
$db 		= new Db;
$poll_id 	= $rest->webhook(2);
$question_id= $rest->webhook(4);
$poll_input_name = "poll_".$poll_id."_".$question_id;

echo "<br>result template BEGIN<HERE><hr/>";

if(Polls::getParam("type", $poll_id) == 1){
	$rst = round(PollsFrontend::getResultPercent($poll_id), 2);
	echo "<h3>Kvzíz ste zodpovedali na <span style='color:red'>".$rst."%</span></h3>";
}elseif(Polls::getParam("type", $poll_id) == 2){
	$rst 			= PollsFrontend::getVendorPoints($poll_id); //returns yout points score
	$poll_range 	= PollsFrontend::getVendorResultPointsRange($poll_id); //return max of range
	$poll_max  		= $poll_range['max'];
	$poll_min  		= $poll_range['min'];
	$catId 			= PollsFrontend::getVendorResultPointsCat($poll_id); //return category ID witch you include
	
	echo "<h3> Výsledok: / Patríte do kategórie / {<span style='font-size:12px'>id kategorie na základe ktorej sa vyberú príslušné dáta </span> <span style='color:red'>".$catId."</span>} s počtom bodov <span style='color:red'>".$rst."</span></h3>";
	echo "<h3> Výsledok: / {<span style='font-size:12px'>bodovy rozsah kategorie je </span> <span style='color:red'>".$poll_min." - ".$poll_max."</span>}</h3>";
	
	echo '<a href="'.WWW_FULL_PATH.'?share='.$catId.'">SHARE URL</a>';
	echo '<img src="'.Image::getPostImage($catId,"dnt_polls_composer").'" style="height: 200px" />';
}
echo "<hr/>result template END <HERE><br/><br/>";



//include TEMPLATE bottom
include "dnt-view/layouts/markiza/bottom.php";