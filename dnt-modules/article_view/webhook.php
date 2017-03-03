<?php
include "dnt-view/layouts/".Vendor::getLayout()."/modules/article_view/webhook.php";

/*
if(empty($rest->webhook(2))){
	//echo "static_view";
	$post_id = $article->getStaticId();
	
	$item = array(
		"name" => $article->getPostParam("name", $post_id),
		"name_url" => $article->getPostParam("name_url", $post_id),
		"perex" => $article->getPostParam("perex", $post_id),
		"content" => $article->getPostParam("content", $post_id),
		"datetime_publish" => $article->getPostParam("datetime_publish", $post_id),
		"name" => $article->getPostParam("name", $post_id),
		"tags" => $article->getPostTags($post_id),
	);
	
	include "dnt-view/layouts/".Vendor::getLayout()."/modules/article_view/tpl.php";
}else{
	//echo "article_view";
	$post_id = $article->getArticleId();
	
	$item = array(
		"name" => $article->getPostParam("name", $post_id),
		"name_url" => $article->getPostParam("name_url", $post_id),
		"perex" => $article->getPostParam("perex", $post_id),
		"content" => $article->getPostParam("content", $post_id),
		"datetime_publish" => $article->getPostParam("datetime_publish", $post_id),
		"name" => $article->getPostParam("name", $post_id),
		"tags" => $article->getPostTags($post_id),
	);
	
	include "dnt-view/layouts/".Vendor::getLayout()."/modules/article_view/tpl.php";
}
*/


/*
$article = new ArticleView;
$post_id = $article->getStaticId();
$post_id = $article->getArticleId();


echo $article->getPostParam("name", $post_id);
echo $article->getPostParam("name_url", $post_id);
echo $article->getPostParam("perex", $post_id);
echo $article->getPostParam("content", $post_id);
echo $article->getPostParam("datetime_publish", $post_id);
echo $article->getPostParam("datetime_publish", $post_id);

foreach ($article->getPostTags($post_id) as $tag){
	echo $tag."<br/>";
}

echo '<hr/>';

echo $article->getTranslate(array("type" => "static", "translate_id" => "home"));

echo $article->getPostImage($post_id);
*/

