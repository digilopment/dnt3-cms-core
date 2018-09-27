<?php
if(isset($_POST['sent'])){
	
	$db = new Db;


	$session = new Sessions;
	
	$table 			= "dnt_users";
	$user 			= new Api;
	$rest 			= new Rest;
	$post_id		= $rest->get("post_id");
	$return 		= $rest->post("return");
	$pass 			= $rest->post("pass");
	//var_dump($user->getColumns($query));
	$query = $query = "SELECT * FROM dnt_users";
	foreach($user->getColumns($query) as $key => $value){
		if(
			$value != "id" &&  
			$value != "id_entity" && 
			$value != "vendor_id" && 
			$value != "ip_adresa" && 
			$value != "parent_id" && 
			$value != "datetime_creat" && 
			$value != "datetime_update" && 
			$value != "login" && 
			$value != "img"
		){
			$setData["".$value.""] = $rest->post($value);
		}
	}
	
	
	//var_dump($setData);
	//exit;
	
	//if($adminUser->validProcessLogin("admin", $session->get("admin_id"), $pass)){
		$db->update(
		$table,	//table
		$setData, //set 
		array( 	//where
			'id_entity' 	=> $post_id, 
			'`vendor_id`' 	=> Vendor::getId())
		);
	
	$dntUpload = new DntUpload;
	$dntUpload->addDefaultImage(
		"userfile",								//input type file
		$table, 								//update table
		"img",	 								//update table column
		"`id`", 								//where column
		$post_id, 								//where value
		"../dnt-view/data/uploads" 				//path
	);
		
	include "tpl_functions.php";
	get_top();
	include "top.php";
	getConfirmMessage($return, "<br/>Údaje sa úspešne uložili ");
	include "bottom.php";
	get_bottom();
}


//echo "Ok";