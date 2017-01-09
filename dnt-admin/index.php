<?php
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);

$rest = new Rest;
$db = new Db;
$session = new Sessions;
$session->init();


//$session->set("logged", "1");

if($session->get("admin_logged")){
	$query = 	"SELECT * FROM `dnt_admin_menu` WHERE 
				`parent_id` = '0' AND 
				`show` = '1' AND
				`type` = 'menu'";
	$data = $db->get_results($query);
	
	//add static modul to arrat
	array_push($data, 
		array("name_url" => "login"), 
		array("name_url" => "logout")
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
	include "modules/login/webhook.php";
}