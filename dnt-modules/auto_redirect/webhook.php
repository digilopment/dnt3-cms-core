<?php
$articleList 	= new ArticleList;
$rest 			= new Rest;

$name_url = $articleList->getArticleUrl($rest->webhook(2), false);
$url = $GLOBALS['ORIGIN_DOMAIN_LNG']."/".$name_url;
if($url)
	Dnt::redirect($url);
else{
	Dnt::redirect(Url::get("WWW_PATH"));
}
