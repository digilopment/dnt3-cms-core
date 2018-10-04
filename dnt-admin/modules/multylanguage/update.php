<?php
if(isset($_POST['sent'])){
	$session = new Sessions;
	$db = new Db;
	
	$table 			= "dnt_translates";
	$return 		= $rest->post("return");
	$translate_id	= $rest->get('translate_id');
	$translate_idUpdate	= $rest->post('translate_id');
	
	
		
	$query = MultyLanguage::getLangs(true);
	if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
				
				$where = array( 'translate_id' => $translate_id, 'vendor_id' => Vendor::getId(), 'lang_id' => $row['slug'], );
				$db->delete($table, $where);
	
				$insertedData = array(
					'`translate`' 		=> $rest->post("translate_".$row['slug']),
					'`lang_id`' 		=> $row['slug'], 
					'`translate_id`' 	=> $translate_idUpdate, 
					'`vendor_id`' 		=> Vendor::getId(),
					'`type`' 			=> 'static',
					'`table`' 			=> '',
					'`show`' 			=> '1',
					'`parent_id`' 		=> '0',
					
				);
				$db->insert($table, $insertedData);
		   }
		 }else{
			 
		 }

	if($return){
		include "tpl_functions.php";
		get_top();
		include "top.php";
		getConfirmMessage("index.php?src=multylanguage&action=translates", "<br/>Údaje sa úspešne uložili ");
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