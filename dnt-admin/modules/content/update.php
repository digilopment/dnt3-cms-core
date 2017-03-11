<?php
if(isset($_POST['sent'])){
	
	//echo "POST";
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
			'embed' => $embed,
			'tags' => $tags,
			'datetime_update' => Dnt::datetime(), //SELECT * FROM `dnt_posts` WHERE id = 10886
			'datetime_publish'=> $datetime_publish, //SELECT * FROM `dnt_posts` WHERE id = 10886
			), 
		array( 	//where
			'id' 			=> $post_id, 
			'`vendor_id`' 	=> Vendor::getId())
	);
	
	
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
	
	
	$dntUpload = new DntUpload;
	$dntUpload->addDefaultImage(
					"userfile",								//input type file
					"dnt_posts", 							//update table
					"img",	 								//update table column
					"`id`", 								//where column
					$post_id, 								//where value
					"../dnt-view/data/".Vendor::getId() 	//path
				);
	
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



