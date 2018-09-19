<?php
$article = new ArticleView;
$rest 		= new Rest;

$id = $rest->webhook(3);
$custom_data = array(
	"post_id" => $id,
	"title" =>  $article->getPostParam("name",  $id)." | ".Settings::get("title") ,
	"meta" => array(
		 '<meta name="keywords" content="'.$article->getPostParam("tags",  $id).'" />',
		 '<meta name="description" content="'.$article->getPostParam("name",  $id).'" />',
		 '<meta content="'.$article->getPostParam("name",  $id).'" property="og:title" />',
		 '<meta content="'.SERVER_NAME.'" property="og:site_name" />',
		 '<meta content="article" property="og:type" />',
		 '<meta content="'.$article->getPostImage($id).'" property="og:image" />',
	),
);

include "tpl.php";



/*
$rest 		= new Rest;
$db 		= new Db;
$poll_id 	= $rest->webhook(2);
$question_id= $rest->webhook(4);
$poll_input_name = "poll_".$poll_id."_".$question_id;

echo $rest->get("share");

if($rest->webhook(4) == false){
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
}else{
	Dnt::redirect(PollsFrontend::url("first", $poll_id, $question_id)); //presmeruj na prvu anketovu otazku
	echo "ERR";
}
*/