<?php
$rest = new Rest;

if(empty($rest->webhook(2))){
	echo "static_view";
}else{
	echo "article_view";
}

$article = new ArticleView;
$post_id = $article->getStaticId();


echo $article->getPostParam("name", $post_id);
echo $article->getPostParam("name_url", $post_id);
echo $article->getPostParam("perex", $post_id);
echo $article->getPostParam("content", $post_id);
echo $article->getPostParam("datetime_publish", $post_id);

foreach ($article->getPostTags($post_id) as $tag){
	echo $tag."<br/>";
}

echo $article->getPostImage($post_id);

