<?php
if(isset($_POST['sent'])){
	
	//data
	$name		= $rest->post("name");
	$surname 	= $rest->post("surname");
	$email 		= $rest->post("email");
	$cat_id 	= $rest->post("cat_id");
	$table 		= "dnt_mailer_mails";
	
	$insertedData = array(
					'name' 				=> $name, 
					'surname' 			=> $surname, 
					'email' 			=> $email, 
					'vendor_id' 		=> Vendor::getId(), 
					'cat_id' 			=> $cat_id, 
					'datetime_creat' 	=> Dnt::datetime(),
					'datetime_update' 	=> Dnt::datetime()
				);
	//insert
	$db->insert('dnt_mailer_mails', $insertedData);
	
	//return
	$dnt->redirect(WWW_PATH_ADMIN_2."?src=mailer");
}else{
	$dnt->redirect(WWW_PATH_ADMIN_2."?src=".DEFAULT_MODUL_ADMIN);
}