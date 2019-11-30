<?php

require '../dnt-library/framework/app/Bootstrap.php';
include "helpers.php";
$bootstrap = new Bootstrap('../../');
$bootstrap->boot();
$app = new App($bootstrap->client);

$rest 		= new Rest();
$dntLog 	= new DntLog();
$dntCache 	= new Cache();
$db 		= new Db();
$session 	= new Sessions();
$adminUser 	= new AdminUser();
$session->init();


			
if(WWW_PATH_ADMIN == HTTP_PROTOCOL.DOMAIN.WWW_FOLDERS."/dnt-admin/"){
	$vendors = Vendor::getAll();
	$lastVendor = end($vendors);
	$url = HTTP_PROTOCOL.$lastVendor['name_url'].".".DOMAIN.WWW_FOLDERS."/dnt-admin/";
	//var_dump($url);
	Dnt::redirect($url);
}

//$session->set("admin_logged", "1");
//var_dump($session->get("admin_logged"));
if($session->get("admin_logged")){
	
	
	
	$query = "SELECT * FROM `dnt_admin_menu` WHERE 
				`parent_id` = '0' AND 
				`show` = '1' AND
				`type` = 'menu' AND vendor_id = ".Vendor::getId()."";
	$data = $db->get_results($query);
	//add static modul to arrat
	array_push($data, 
		array("name_url" => "login"), 
		array("name_url" => "logout"),
		array("name_url" => "pdfgen"),
		array("name_url" => "menucreator"),
		array("name_url" => "vendor")
	);
	if($rest->get('src')){
		if ($db->num_rows($query) > 0){
			foreach($data as $row){
				if(in_array($rest->get('src'), $row)){
					include_once "modules/".$row['name_url']."/webhook.php";
				}
				/*else{
					include_once "modules/default/tpl.php";
					break;
				}*/
				
			}
		}
	}else{
		include_once "modules/".DEFAULT_MODUL_ADMIN."/webhook.php";
	}
}else{
	$ip = $_SERVER['REMOTE_ADDR'];
	$countryCode = Dnt::getCountryCode($ip);
	if(ENABLE_BACKEND_GEO_IP_SERVICE != true || $countryCode == "sk"){
		if($rest->get('src') == "forgotten-password"){
			include "modules/forgotten-password/webhook.php";
		}else{
			include "modules/login/webhook.php";
		}
	}else{
		include "modules/error/webhook.php";
	}
}