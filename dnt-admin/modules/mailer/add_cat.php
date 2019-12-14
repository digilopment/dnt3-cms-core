<?php
if(isset($_POST['sent'])){
	
	//data
	$name		= $rest->post("name");
	$table 		= "dnt_mailer_type";
	
	$name_url 	= Dnt::name_url($name); 
	
	$insertedData = array(
					'name' 				=> $name, 
					'name_url' 			=> $name_url, 
					'vendor_id' 		=> Vendor::getId(), 
					'`show`' 			=> 1, 
					'`order`' 			=> 1, 
				);
	//insert
	$db->insert('dnt_mailer_type', $insertedData);
	
	//return
	$dnt->redirect(WWW_PATH_ADMIN_2."?src=mailer");
}else{
	$dnt->redirect(WWW_PATH_ADMIN_2."?src=".DEFAULT_MODUL_ADMIN);
}