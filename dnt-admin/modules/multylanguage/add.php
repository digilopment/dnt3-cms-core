<?php
$table 			= "dnt_translates";
$return 		= $rest->post("return");
$translate_id	= "default_".time();
$db = new Db;



$query = MultyLanguage::getLangs(true);
if($db->num_rows($query)>0){
   foreach($db->get_results($query) as $row){
	   
		$insertedData = array(
			'`translate`' 		=> $rest->post("translate_".$row['slug']),
			'`lang_id`' 		=> $row['slug'], 
			'`translate_id`' 	=> $translate_id, 
			'`vendor_id`' 		=> Vendor::getId(),
			'`type`' 			=> 'static',
			'`table`' 			=> '',
			'`show`' 			=> '1',
			'`parent_id`' 		=> '0',
			
		);
		$db->insert($table, $insertedData);
   }
   $dnt->redirect("index.php?src=multylanguage&action=edit&translate_id=$translate_id");
 }else{
	$dnt->redirect("index.php"); 
 }
 