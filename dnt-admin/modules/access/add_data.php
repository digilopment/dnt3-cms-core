<?php
if(isset($_POST['sent'])){
	$query = $query = "SELECT * FROM dnt_users";
	$table 			= "dnt_users";
	$user 			= new Api;
	$rest 			= new Rest;
	
	$pass 			= $rest->post("pass");
	$re_pass 		= $rest->post("re_pass");
	
	if($pass == $re_pass && ($pass != "")){
		
		foreach($user->getColumns($query) as $key => $value){
			if($value != "id" && "id_entity" && "vendor_id" && "pass"){
				$insertedData["`".$value."`"] = $rest->post($value);
				if($rest->post("type") == ""){
					$insertedData["`type`"] = "admin";
				}
				if($rest->post("login") == ""){
					$insertedData["`login`"] = Vendor::getColumn("name_url");
				}
			}
		}
		$db->insert($table, $insertedData);
		$post_id = Dnt::getLastId($table, false);

		$db->update(
			$table,	//table
			array(	//set
				'vendor_id' 		=> Vendor::getId(),
				'status' 			=> 1,
				'pass' 				=> md5($pass),
				'datetime_creat' 	=> Dnt::datetime(),
				'datetime_update' 	=> Dnt::datetime(),
				'datetime_publish' 	=> Dnt::datetime(),
				), 
			array( 	//where
				'id_entity' => $post_id, 
			)
		);
		$return = "index.php?src=access&action=edit&post_id=$post_id";
			
		$dntUpload = new DntUpload;
		$dntUpload->addDefaultImage(
						"userfile",								//input type file
						$table, 								//update table
						"img",	 								//update table column
						"`id_entity`", 								//where column
						$post_id, 								//where value
						"../dnt-view/data/uploads" 	//path
					);
		include "tpl_functions.php";
		get_top();
		include "top.php";
		getConfirmMessage($return, "<br/>Údaje sa úspešne uložili ");
		include "bottom.php";
		get_bottom();
		
	}else{
		include "tpl_functions.php";
		get_top();
		include "top.php";
		error_message("heslo", "<b>Vaše heslá sa musia zhodovať</b>");
		include "bottom.php";
		get_bottom();
	}
	
	/*$session = new Sessions;
	
	$table 			= "dnt_users";
	
	$rest 			= new Rest;
	$post_id		= $rest->get("post_id");
	$return 		= $rest->post("return");
	
	$name 			= $rest->post("name");
	$surname 		= $rest->post("surname");
	$email 			= $rest->post("email");
	$pass 			= $rest->post("pass");
	$group 			= $rest->post("group");
	

	if($adminUser->validProcessLogin("admin", $session->get("admin_id"), $pass)){
		$db->update(
		$table,	//table
		array(	//set
			'name' => $name,
			'surname' => $surname,
			'email' => $email,
			'type' => $group,
			'datetime_update' => Dnt::datetime(), //SELECT * FROM `dnt_posts` WHERE id = 10886
			), 
		array( 	//where
			'id' 			=> $post_id, 
			'`vendor_id`' 	=> Vendor::getId())
		);
	
		$dntUpload = new DntUpload;
		$dntUpload->addDefaultImage(
						"userfile",								//input type file
						$table, 								//update table
						"img",	 								//update table column
						"`id`", 								//where column
						$post_id, 								//where value
						"../dnt-view/data/uploads" 	//path
					);
		include "tpl_functions.php";
		get_top();
		include "top.php";
		getConfirmMessage($return, "<br/>Údaje sa úspešne uložili ");
		include "bottom.php";
		get_bottom();
	}
	else{
		include "tpl_functions.php";
		get_top();
		include "top.php";
		error_message("heslo", "<b>Prosím zadajte vaše heslo pre uloženie údajov</b>");
		include "bottom.php";
		get_bottom();
	}*/
}else{
	$dnt->redirect(WWW_PATH_ADMIN."?src=".DEFAULT_MODUL_ADMIN);
}