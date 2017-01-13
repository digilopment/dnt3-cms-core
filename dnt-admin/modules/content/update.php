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
	$name_url 		= $rest->post("name_url");
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
	
	$dntUpload = new DntUpload;
	$dntUpload->addDefaultImage(
					"userfile",								//input type file
					"dnt_posts", 							//update table
					"img",	 								//update table column
					"`id`", 								//where column
					$post_id, 								//where value
					"../dnt-system/data/".Vendor::getId() 	//path
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



