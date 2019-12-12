<?php
if(isset($_POST['sent'])){
	$session = new Sessions;
	$db = new Db;
	
	
	
	$langs = array();
	$query = MultyLanguage::getLangs(true);
	if($db->num_rows($query) > 0){
		foreach($db->get_results($query) as $row){			
		 $langs[] = $row['slug'];
		}
	}
	
	  foreach(MultyLanguage::getTranslates() as $item) {
		  if(in_array($item['lang_id'], $langs)){
			   $db->update(
				"dnt_translates",	//table
				array(	//set
					'translate' =>  $rest->post("translate_".$item['id_entity'])
					), 
				array( 	//where
					'`vendor_id`' 	=> Vendor::getId(),
					'`id_entity`' 	=> $item['id_entity']
				)
			);
		  }
	  }

	
	
	get_top();
	get_top_html();
	getConfirmMessage("index.php?src=multylanguage&action=translate-all", "<br/>Údaje sa úspešne uložili ");
	get_bottom_html();
	get_bottom();
}else{
	$dnt->redirect(WWW_PATH_ADMIN_2."?src=".DEFAULT_MODUL_ADMIN);
}