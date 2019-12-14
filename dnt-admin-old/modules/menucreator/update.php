<?php
if(isset($_POST['sent'])){
	$ids = array();
	foreach(array_keys($_POST) as $id){
		if(Dnt::in_string("name_", $id)){
			$ids[] = str_replace("name_", "", $id);
		}
	}
	
	foreach($ids as $id){
		$db->update("dnt_admin_menu",	//table
			array(	//set
				'name' =>  $rest->post("name_".$id),
				'name_url' =>  $rest->post("name_url_".$id),
				'name_url_sub' =>  $rest->post("name_url_sub_".$id),
				'order' =>  $rest->post("order_".$id),
				'show' =>  $rest->post("show_".$id),
				'ico' =>  $rest->post("ico_".$id),
				'type' =>  $rest->post("type_".$id),
				), 
			array( 	//where
				'`vendor_id`' 	=> Vendor::getId(),
				'`id_entity`' 	=> $id
			)
		);
	}
	Dnt::redirect(WWW_PATH_ADMIN."?src=menucreator");
}else{
	Dnt::redirect(WWW_PATH_ADMIN."?src=".DEFAULT_MODUL_ADMIN);
}