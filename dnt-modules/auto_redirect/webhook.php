<?php
$articleList 	= new ArticleList;
$rest 			= new Rest;

$name_url = $articleList->getArticleUrl($rest->webhook(2), false);
$url = $GLOBALS['ORIGIN_DOMAIN_LNG']."/".$name_url;
if($url){
	if(Dnt::in_string("<WWW_PATH>", $name_url)){
		Dnt::redirect(str_replace("<WWW_PATH>", WWW_PATH, $name_url));
	}else{
		Dnt::redirect($url);
	}
}
else{
	Dnt::redirect(Url::get("WWW_PATH"));
}
