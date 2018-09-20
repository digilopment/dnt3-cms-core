<?php

$db = new Db;
if(isset($_POST['sent'])){
	
	$vendor_id = $rest->post("vendor_id");
	$name = $rest->post("name");
	$url = $rest->post("url");
	$layout = $rest->post("layout");
	$zobrazit_show_real_url = $rest->post("zobrazit_show_real_url");
	$zobrazit_in_progress = $rest->post("zobrazit_in_progress");
	$real_url = $rest->post("real_url");
	$return = $rest->post("return");
	
	
	$db->update(
		"dnt_vendors",	//table
		array(	//set
			'name' => $name,
			'name_url' => $url,
			'layout' => $layout,
			'show_real_url' => $zobrazit_show_real_url,
			'in_progress' => $zobrazit_in_progress,
			'real_url' => $real_url,
			), 
		array( 	//where
			'`id`' 	=> $vendor_id)
		);
		
		include "tpl_functions.php";
		get_top();
		include "top.php";
		getConfirmMessage($return, "<br/>Údaje sa úspešne uložili ");
		include "bottom.php";
		get_bottom();
		

	
}

exit;
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
			'id_entity' 			=> $post_id, 
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
						"`id_entity`", 								//where column
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