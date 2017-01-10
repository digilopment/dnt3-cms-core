<?php
$rest = new Rest;
$session = new Sessions;
$dnt 	= new Dnt;
$db 	= new Db;

if($rest->get("action") == "update")
{
	if(isset($_POST['sent_1'])){
		
		$keywords 			= $rest->post('keywords');
		$nadpis_stranky 	= $rest->post('title');
		$startovaci_modul 	= $rest->post('startovaci_modul');
		$target 			= $rest->post('startovaci_modul');
		$default_lang 		= $rest->post('default_lang');
		$return 			= $rest->post('return');
		$default_stat_user 	= $rest->post('default_stat_user');
		$cachovanie 		= $rest->post('cachovanie');
		
		$db->update('dnt_settings', array( 'value' => $default_lang), array( '`key`' => 'default_lang', '`vendor_id`' => VENDOR_ID ));
		$db->update('dnt_settings', array( 'value' => $keywords), array( '`key`' => 'keywords', '`vendor_id`' => VENDOR_ID ));
		$db->update('dnt_settings', array( 'value' => $nadpis_stranky), array( '`key`' => 'title', '`vendor_id`' => VENDOR_ID ));
		$db->update('dnt_settings', array( 'value' => $startovaci_modul), array( '`key`' => 'startovaci_modul', '`vendor_id`' => VENDOR_ID ));
		$db->update('dnt_settings', array( 'value' => $target), array( '`key`' => 'target', '`vendor_id`' => VENDOR_ID ));
		$db->update('dnt_settings', array( 'value' => $default_stat_user), array( '`key`' => 'default_stat_user', '`vendor_id`' => VENDOR_ID ));
		$db->update('dnt_settings', array( 'value' => $cachovanie), array( '`key`' => 'cachovanie', '`vendor_id`' => VENDOR_ID ));
	
	}elseif(isset($_POST['sent_2'])){
		
	}
	
	include "tpl_functions.php";
	get_top();
	include "top.php";
	getConfirmMessage($return, "<br/>Údaje sa úspešne uložili");
	include "bottom.php";
	get_bottom();
}
elseif($rest->get("action") == "add")
{
	
}
else{
	include "tpl.php";
}