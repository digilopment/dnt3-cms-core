<?php

class Frontend{
	public function get($custom_data = false){
		
		$article = new ArticleView;
		
		
		if($custom_data == false){
			$custom_data = array(array(false));
		}
		
		$post_id = isset($custom_data['artcile']['post_id']) ? $custom_data['artcile']['post_id'] : $article->getStaticId();
		
		$data = array(
		"media_path" => WWW_PATH."dnt-view/layouts/".Vendor::getLayout()."/",
		"title" => Settings::get("title"),
		"meta" => array(
			 '<meta name="keywords" content="'.Settings::get("keywords").'" />',
			 '<meta name="description" content="'.Settings::get("description").'" />',
			 '<meta content="'.$article->getPostParam("name",  $post_id).'" property="og:title" />',
			 '<meta content="'.SERVER_NAME.'" property="og:site_name" />',
			 '<meta content="article" property="og:type" />',
			 '<meta content="'.$article->getPostImage( $post_id).'" property="og:image" />',
		),
		"settings" => array(
			"vendor_company" => Settings::get("vendor_company"),
			"vendor_street" => Settings::get("vendor_street"),
			"vendor_psc" => Settings::get("vendor_psc"),
			"vendor_city" => Settings::get("vendor_city"),
			"vendor_tel" => Settings::get("vendor_tel"),
			"vendor_fax" => Settings::get("vendor_fax"),
			"vendor_email" => Settings::get("vendor_email"),
			"vendor_ico" => Settings::get("vendor_ico"),
			"vendor_dic" => Settings::get("vendor_dic"),
			"vendor_iban" => Settings::get("vendor_iban"),
			
			"facebook_page" => Settings::get("facebook_page"),
		),
		"article" => array(
			"name" => $article->getPostParam("name", $post_id),
			"name_url" => $article->getPostParam("name_url", $post_id),
			"perex" => $article->getPostParam("perex", $post_id),
			"content" => $article->getPostParam("content", $post_id),
			"datetime_publish" => $article->getPostParam("datetime_publish", $post_id),
			"name" => $article->getPostParam("name", $post_id),
			"tags" => $article->getPostTags($post_id),
			"img" => $article->getPostImage($post_id),
		),
		"timestamp" => time(),
	);
	
	
	
	
	$data = array_merge($data,$custom_data);
	//var_dump($data);
	return $data;
	}
}