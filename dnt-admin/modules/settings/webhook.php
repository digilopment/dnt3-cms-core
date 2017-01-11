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
		//$default_stat_user 	= $rest->post('default_stat_user');
		$cachovanie 		= $rest->post('cachovanie');
		
		$db->update('dnt_settings', array( 'value' => $default_lang), array( '`key`' => 'default_lang', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $keywords), array( '`key`' => 'keywords', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $nadpis_stranky), array( '`key`' => 'title', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $startovaci_modul), array( '`key`' => 'startovaci_modul', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $target), array( '`key`' => 'target', '`vendor_id`' => Vendor::getId()));
		//$db->update('dnt_settings', array( 'value' => $default_stat_userz), array( '`key`' => 'default_stat_user', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $cachovanie), array( '`key`' => 'cachovanie', '`vendor_id`' => Vendor::getId()));
	
	}elseif(isset($_POST['sent_2'])){
		
		$notifikacny_email 	= $rest->post('notifikacny_email');
		$facebook_page 		= $rest->post('facebook_page');
		$twitter 			= $rest->post('twitter');
		$youtube 			= $rest->post('youtube');
		$flickr 			= $rest->post('flickr');
		$google_map 		= $rest->post('google_map');
		$return 			= $rest->post('return');
		
		$db->update('dnt_settings', array( 'value' => $notifikacny_email), array( '`key`' => 'notifikacny_email', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $facebook_page), array( '`key`' => 'facebook_page', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $twitter), array( '`key`' => 'twitter', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $youtube), array( '`key`' => 'youtube', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $flickr), array( '`key`' => 'flickr', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $google_map), array( '`key`' => 'google_map', '`vendor_id`' => Vendor::getId()));
		
		
	}elseif(isset($_POST['sent_3'])){
		
		$vendor_company		= $rest->post('vendor_company');
		$vendor_street 		= $rest->post('vendor_street');
		$vendor_psc 		= $rest->post('vendor_psc');
		$vendor_city		= $rest->post('vendor_city');
		$vendor_tel 		= $rest->post('vendor_tel');
		$vendor_fax 		= $rest->post('vendor_fax');
		$vendor_email 		= $rest->post('vendor_email');
		$vendor_ico 		= $rest->post('vendor_ico');
		$vendor_dic 		= $rest->post('vendor_dic');
		$vendor_iban 		= $rest->post('vendor_iban');
		$return 			= $rest->post('return');
	
		$db->update('dnt_settings', array( 'value' => $vendor_company), array( '`key`' => 'vendor_company', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $vendor_street), array( '`key`' => 'vendor_street', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $vendor_psc), array( '`key`' => 'vendor_psc', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $vendor_city), array( '`key`' => 'vendor_city', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $vendor_tel), array( '`key`' => 'vendor_tel', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $vendor_fax), array( '`key`' => 'vendor_fax', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $vendor_email), array( '`key`' => 'vendor_email', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $vendor_ico), array( '`key`' => 'vendor_ico', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $vendor_dic), array( '`key`' => 'vendor_dic', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $vendor_iban), array( '`key`' => 'vendor_iban', '`vendor_id`' => Vendor::getId()));
	
	
	
	}elseif(isset($_POST['sent_4'])){
		$platca_dph 		= $rest->post('platca_dph');
		$znak_meny 			= $rest->post('znak_meny');
		$nazov_meny 		= $rest->post('nazov_meny');;
		$dph 				= $rest->post('dph');
		$return 			= $rest->post('return');
		
		$db->update('dnt_settings', array( 'value' => $platca_dph), array( '`key`' => 'platca_dph', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $znak_meny), array( '`key`' => 'znak_meny', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $nazov_meny), array( '`key`' => 'nazov_meny', '`vendor_id`' => Vendor::getId()));
		$db->update('dnt_settings', array( 'value' => $dph), array( '`key`' => 'dph', '`vendor_id`' => Vendor::getId()));
	}
	elseif(isset($_POST['odoslat_logo'])){
		$return	= $rest->post('return');
		$dntUpload = new DntUpload;
		$dntUpload->addDefaultImage(
						"userfile",								//input type file
						"dnt_settings", 						//update table
						"value", 								//update table column
						"`key`", 								//where column
						"logo_firmy", 							//where value
						"../dnt-system/data/".Vendor::getId() 	//path
					);
	}elseif(isset($_POST['odoslat_noimage'])){
		$return	= $rest->post('return');
		$dntUpload = new DntUpload;
		$dntUpload->addDefaultImage(
						"userfile", 							//input type file
						"dnt_settings", 						//update table
						"value", 								//update table column
						"`key`", 								//where column
						"no_img", 								//where value
						"../dnt-system/data/".Vendor::getId() 	//path
					);
	}
	
	//show template
	include "tpl_functions.php";
	get_top();
	include "top.php";
	getConfirmMessage($return, "<br/>Údaje sa úspešne uložili ");
	include "bottom.php";
	get_bottom();
}
elseif($rest->get("action") == "add")
{
	//empty
}
else{
	include "tpl.php";
}