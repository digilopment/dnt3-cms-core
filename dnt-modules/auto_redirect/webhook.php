<?php
$articleList 	= new ArticleList;
$rest 			= new Rest;
$url = $articleList->getArticleUrl($rest->webhook(2));
if($url)
	Dnt::redirect($url);
else{
	Dnt::redirect(Url::get("WWW_PATH"));
}