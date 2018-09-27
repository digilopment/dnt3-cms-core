<?php
if(isset($_POST['sent'])){
	$query = $query = "SELECT * FROM dnt_users";
	$table 			= "dnt_users";
	$user 			= new Api;
	$rest 			= new Rest;
	

	

		
		foreach($user->getColumns($query) as $key => $value){
			if(
				$value != "id" &&
				$value != "id_entity" &&
				$value != "vendor_id"
			
			){
				$insertedData["`".$value."`"] = $rest->post($value);
				$insertedData["`vendor_id`"] = Vendor::getId();
			}
		}
		//$db->dbTransaction();
		$db->insert($table, $insertedData);
		var_dump(Dnt::getLastId($table));
		$post_id = Dnt::getLastId($table);
		$db->update(
			$table,	//table
			array(	//set
				'vendor_id' => Vendor::getId(),
				'datetime_creat' => Dnt::datetime(),
				'datetime_update' => Dnt::datetime(),
				'datetime_publish' => Dnt::datetime(),
				), 
			array( 	//where
				'id_entity' => $post_id,
			)
		);
		$return = "index.php?src=user&action=edit&post_id=$post_id";
			
		$dntUpload = new DntUpload;
		$dntUpload->addDefaultImage(
						"userfile",								//input type file
						$table, 								//update table
						"img",	 								//update table column
						"`id_entity`", 								//where column
						$post_id, 								//where value
						"../dnt-view/data/uploads" 	//path
					);
		//$db->dbCommit();
		include "tpl_functions.php";
		get_top();
		include "top.php";
		getConfirmMessage($return, "<br/>Údaje sa úspešne uložili ");
		include "bottom.php";
		get_bottom();
		
}else{
	$dnt->redirect(WWW_PATH_ADMIN."?src=".DEFAULT_MODUL_ADMIN);
}