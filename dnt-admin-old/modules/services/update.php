<?php
//echo "TU SOM";
$db = new Db;
$dntUpload 	= new DntUpload;
$path 		= "../dnt-view/data/uploads";
$articleView = new ArticleView;
if(isset($_POST['sent'])){
	$return = $rest->post("return");
	foreach($article->getPostsMeta($postId, $rest->get("services")) as $row){
		
		if($row['content_type'] == "image" or $row['content_type'] == "file"){
			
				if($rest->post('gallery_key_' . $row['id_entity'])){
					if($rest->post('gallery_key_' . $row['id_entity']) == "del"){
						$galleryData = "";
					}else{
						$galleryData = $rest->post('gallery_key_' . $row['id_entity']);
					}
					$db->update(
						"dnt_posts_meta",	//table
						array(	//set
							'value' => $galleryData,
							), 
						array( 	//where
								'id_entity' 	=> $row['id_entity'], 
								'service' 		=> $rest->get("services"),
								'`vendor_id`' 	=> Vendor::getId()
							)
						);
				}else{
				$dntUpload->multypleUploadFiles(
						$_FILES['userfile_' . $row['id_entity']],	//input type file
						"dnt_posts_meta", 							//update table
						"value",	 								//update table column
						"`id_entity`", 									//where column
						$row['id_entity'], 							//where value
						$path 										//path
					);
				}
		}elseif($row['content_type'] == "youtube_embed"){
			//$files 	= 'userfile_'.$row['id_entity']; 
				$db->update(
				"dnt_posts_meta",	//table
				array(	//set
					'value' => Dnt::youtubeVideoToEmbed($rest->post("key_" . $row['id_entity'])),
					), 
				array( 	//where
						'id_entity' 	=> $row['id_entity'], 
						'service' 		=> $rest->get("services"),
						'`vendor_id`' 	=> Vendor::getId())
				);
		}else{
			$db->update(
			"dnt_posts_meta",	//table
			array(	//set
				'value' => $rest->post("key_" . $row['id_entity'])
				), 
			array( 	//where
					'id_entity' 	=> $row['id_entity'], 
					'service' 		=> $rest->get("services"),
					'`vendor_id`' 	=> Vendor::getId())
			);
		}
		
		$db->update(
			"dnt_posts_meta",	//table
			array(				//set
				'show' => $rest->post("zobrazit_" . $row['id_entity'])
				), 
			array( 	//where
					'id_entity' 	=> $row['id_entity'], 
					'service' 		=> $rest->get("services"),
					'`vendor_id`' 	=> Vendor::getId())
		);
			
			
		$searchMeta = array();
			if($row['content_type'] == "text" || "content"){
				$searchMeta[] = $row['value'];
			}
		}
		$searchMeta = implode("",$searchMeta);
		$name 		= $articleView->getPostParam("name", $postId);
		$name_url 	= $articleView->getPostParam("name_url", $postId);
		$content 	= $articleView->getPostParam("content", $postId);
		$perex 		= $articleView->getPostParam("perex", $postId);
		$search = $name.$name_url.$content.$perex.$searchMeta;
		$search = html_entity_decode($search);
		$search = Dnt::not_html($search);
		$search = Dnt::name_url($search);
		$search = str_replace("-", "", $search);
		
		
		$db->update(
		"dnt_posts",	//table
		array(	//set
			'search' => $search,
			), 
		array( 	//where
			'id_entity' 	=> $postId, 
			'`vendor_id`' 	=> Vendor::getId())
			);
			
	include "tpl_functions.php";
	get_top();
	include "top.php";
	getConfirmMessage($return, "<br/>Údaje sa úspešne uložili ");
	include "bottom.php";
	get_bottom();
	}