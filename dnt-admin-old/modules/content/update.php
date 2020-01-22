<?php

if(isset($_POST['sent'])){
	
	$article = new ArticleView;
	//echo "POST";
	$cache 			= new Cache;
	$post_id		= $rest->get("post_id");
	$return 		= $rest->post("return");
	$table 			= "dnt_posts";
	
	$cat_id 		= $rest->post("cat_id");
	$sub_cat_id 	= $rest->post("sub_cat_id");
	$type 			= $rest->post("type");
	$show 			= $rest->post("show");
	$protected 		= $rest->post("protected");
	$name 			= $rest->post("name");
	$name_url 		= Dnt::creat_name_url($rest->post("name"), $rest->post("name_url"));
	$datetime_publish = Dnt::timeToDbFormat(".", $rest->post("datetime_publish"));
	$perex 			= $rest->post("perex");
	$content 		= $rest->post("content");
	$embed 			= $rest->post("embed");
	$tags 			= $rest->post("tags");
	$service 		= $rest->post("service");
	$service_id 	= $rest->post("service_id");
	
	$searchMeta = array();
	if($service){
		foreach($article->getPostsMeta($post_id, $service) as $meta){
			if($meta['content_type'] == "text" || "content"){
				$searchMeta[] = $meta['value'];
			}
		}
	}
	$searchMeta = implode("",$searchMeta);
	
	$search = $name.$name_url.$content.$perex.$searchMeta;
	$search = html_entity_decode($search);
	$search = Dnt::not_html($search);
	$search = Dnt::name_url($search);
	$search = str_replace("-", "", $search);

	//echo $embed;
	
	 $db->update(
		$table,	//table
		array(	//set
			'cat_id' => $cat_id,
			'sub_cat_id' => $sub_cat_id,
			'type' => $type,
			'show' => $show,
			'protected' => $protected,
			'name' => $name,
			'name_url' => $name_url,
			'datetime_publish' => $datetime_publish,
			'perex' => $perex,
			'content' => $content,
			'search' => $search,
			'embed' => $embed,
			'tags' => $tags,
			'datetime_update' => Dnt::datetime(), //SELECT * FROM `dnt_posts` WHERE id = 10886
			'datetime_publish'=> $datetime_publish, //SELECT * FROM `dnt_posts` WHERE id = 10886
			'service'	=>	$service, //SELECT * FROM `dnt_posts` WHERE id = 10886
			'service_id'	=>	$service_id, //SELECT * FROM `dnt_posts` WHERE id = 10886
			), 
		array( 	//where
			'id_entity' 			=> $post_id, 
			'`vendor_id`' 	=> Vendor::getId())
	);
	
	
	$cat_name_url = ArticleList::getArticleUrl($post_id);
	$cat_name_url = (str_replace(WWW_PATH, "", $cat_name_url));
	
	//delete as sitemap
	$cache->delete($GLOBALS['ORIGIN_DOMAIN']."/".$name_url);
	$cache->delete($GLOBALS['DB_DOMAIN']."/".$name_url);
	
	//delete as detail
	$cache->delete($GLOBALS['ORIGIN_DOMAIN']."/".$cat_name_url);
	$cache->delete($GLOBALS['DB_DOMAIN']."/".$cat_name_url);
	
	/*
	foreach($cache->deteleAllLangs($name_url) as $langDel){
		$cache->delete($langDel);
	}
	*/
	
	
	
	//MULTYLANGUAGE BEGIN
	//vymaze aktualne preklady
	$where = array( '`translate_id`' => $post_id, '`table`' => "dnt_posts");
	$db->delete( 'dnt_translates', $where);
	
	$multylanguages 	= new MultyLanguage;
	$query 	= $multylanguages->getLangs();
	if($db->num_rows($query)>0){
	   foreach($db->get_results($query) as $row){
			$name 		= $rest->post("name_".$row['slug']);
			$name_url 	= $rest->post("name_url_".$row['slug']);
			$content	= $rest->post("name_content_".$row['slug']);
			$perex		= $rest->post("name_perex_".$row['slug']);
			$tags		= $rest->post("name_tags_".$row['slug']);
			
			//DELETE MULTYLANGUAGE CACHE FILES
			/*foreach($cache->deteleAllLangs($name_url) as $langDel){
				$cache->delete($langDel);
			}*/
			
			//name
			$insertedData = array(
					'`vendor_id`' 		=> Vendor::getId(), 
					'`lang_id`' 		=> $row['slug'], 
					'`translate_id`' 	=> $post_id, 
					'`type`' 			=> "name", 
					'`table`' 			=> "dnt_posts",
					'`translate`' 		=> $name,
					'`show`' 			=> 1,
					'`parent_id`' 		=> '0' 
				);
			$db->insert('dnt_translates', $insertedData);
			
			//name_url
			$insertedData = array(
					'`vendor_id`' 		=> Vendor::getId(), 
					'`lang_id`' 		=> $row['slug'], 
					'`translate_id`' 	=> $post_id, 
					'`type`' 			=> "name_url", 
					'`table`' 			=> "dnt_posts",
					'`translate`' 		=> $name_url,
					'`show`' 			=> 1,
					'`parent_id`' 		=> '0' 
				);
			$db->insert('dnt_translates', $insertedData);
			
			//perex
			$insertedData = array(
					'`vendor_id`' 		=> Vendor::getId(), 
					'`lang_id`' 		=> $row['slug'], 
					'`translate_id`' 	=> $post_id, 
					'`type`' 			=> "perex", 
					'`table`' 			=> "dnt_posts",
					'`translate`' 		=> $perex,
					'`show`' 			=> 1,
					'`parent_id`' 		=> '0' 
				);
			$db->insert('dnt_translates', $insertedData);
			
			//content
			$insertedData = array(
					'`vendor_id`' 		=> Vendor::getId(), 
					'`lang_id`' 		=> $row['slug'], 
					'`translate_id`' 	=> $post_id, 
					'`type`' 			=> "content", 
					'`table`' 			=> "dnt_posts",
					'`translate`' 		=> $content,
					'`show`' 			=> 1,
					'`parent_id`' 		=> '0' 
				);
			$db->insert('dnt_translates', $insertedData);
			
			//tags
			$insertedData = array(
					'`vendor_id`' 		=> Vendor::getId(), 
					'`lang_id`' 		=> $row['slug'], 
					'`translate_id`' 	=> $post_id, 
					'`type`' 			=> "tags", 
					'`table`' 			=> "dnt_posts",
					'`translate`' 		=> $tags,
					'`show`' 			=> 1,
					'`parent_id`' 		=> '0' 
				);
			$db->insert('dnt_translates', $insertedData);
	   }
	}
	
	
	if($rest->post("gallery_key_".$post_id)){
		if($rest->post("gallery_key_".$post_id) == "del"){
			$galleryData = "";
		}else{
			$galleryData = $rest->post("gallery_key_".$post_id);
		}
		$db->update(
		$table,	//table
		array(	//set
			'img' => $galleryData,
			), 
		array( 	//where
			'id_entity' 			=> $post_id, 
			'`vendor_id`' 	=> Vendor::getId())
		);
	}else{
	$dntUpload = new DntUpload;
	$dntUpload->addDefaultImage(
					"userfile",								//input type file
					"dnt_posts", 							//update table
					"img",	 								//update table column
					"`id_entity`", 								//where column
					$post_id, 								//where value
					"../dnt-view/data/uploads" 				//path
				);
	}
	
	//show template
	//echo $datetime_publish;
	include "tpl_functions.php";
	get_top();
	include "top.php";
	getConfirmMessage($return, "<br/>Údaje sa úspešne uložili ");
	include "bottom.php";
	get_bottom();
	
	
	//confrim_message($return, "Údaje sa úspešne uložili");
}else{
	$dnt->redirect(WWW_PATH_ADMIN."?src=".DEFAULT_MODUL_ADMIN);
}



