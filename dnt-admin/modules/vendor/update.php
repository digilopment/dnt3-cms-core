<?php
if(isset($_POST['sent'])){
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
		if($value != "id" && ($rest->post($value) != false) && $value != "pass"){
			$setData["".$value.""] = $rest->post($value);
		}
	}
	if($adminUser->validProcessLogin("admin", $session->get("admin_id"), $pass)){
		$db->update(
		$table,	//table
		$setData, //set 
		array( 	//where
			'id' 			=> $post_id, 
			'`vendor_id`' 	=> Vendor::getId())
		);
		
	/*$name 			= $rest->post("name");
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
	*/
	
		$dntUpload = new DntUpload;
		$dntUpload->addDefaultImage(
						"userfile",								//input type file
						$table, 								//update table
						"img",	 								//update table column
						"`id`", 								//where column
						$post_id, 								//where value
						"../dnt-view/data/".Vendor::getId() 	//path
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
	}
}else{
	$dnt->redirect(WWW_PATH_ADMIN."?src=".DEFAULT_MODUL_ADMIN);
}