<?php
//echo "TU SOM";
$db = new Db;
$dntUpload 	= new DntUpload;
$path 		= "../dnt-view/data/uploads";
if(isset($_POST['sent'])){
	$return = $rest->post("return");
	foreach($article->getPostsMeta($postId, $rest->get("services")) as $row){
		
		
		if($row['content_type'] == "image"){
			//$files 	= 'userfile_'.$row['id_entity']; 
				$dntUpload->multypleUploadFiles(
						$_FILES['userfile_' . $row['id_entity']],	//input type file
						"dnt_posts_meta", 							//update table
						"value",	 								//update table column
						"`id_entity`", 									//where column
						$row['id_entity'], 							//where value
						$path 										//path
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
			
	}

	include "tpl_functions.php";
	get_top();
	include "top.php";
	getConfirmMessage($return, "<br/>Údaje sa úspešne uložili ");
	include "bottom.php";
	get_bottom();
}