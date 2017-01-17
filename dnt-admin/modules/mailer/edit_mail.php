<?php

if(isset($_POST['sent'])){
	
	//echo "POST";
	$post_id	= $rest->get("post_id");
	$name		= $rest->post("name");
	$surname 	= $rest->post("surname");
	$email 		= $rest->post("email");
	$cat_id 	= $rest->post("cat_id");
	$return 	= $rest->post("return");
	$table 		= "dnt_mailer_mails";

	
	//echo $embed;
	
	 $db->update(
		$table,	//table
		array(	//set
			'name' => $name,
			'surname' => $surname,
			'email' => $email,
			'cat_id' => $cat_id,
			'datetime_update' => Dnt::datetime()
			), 
		array( 	//where
			'id' 			=> $post_id, 
			'`vendor_id`' 	=> Vendor::getId())
	);
	$dnt->redirect($return);
	
}else{
	$dnt->redirect(WWW_PATH_ADMIN."?src=".DEFAULT_MODUL_ADMIN);
}