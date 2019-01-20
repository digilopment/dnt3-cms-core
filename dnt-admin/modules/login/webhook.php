<?php
$rest = new Rest;
$session = new Sessions;
$dnt = new Dnt;
$db = new Db;
$adminUser = new AdminUser;
if($rest->get("action") == 1){
	if(isset($_POST['sent'])){
		$email = $rest->post("email");
		$pass = $rest->post("pass");
		if($adminUser->validProcessLogin("admin", $email, $pass)){
			$session->set("admin_logged", "1");
			$session->set("admin_id",$email);
			AdminUser::updateDatetime(Vendor::getId(), $email);
		}
	}
	$dnt->redirect(WWW_PATH_ADMIN."?src=".DEFAULT_MODUL_ADMIN);
}
elseif($rest->get("action") == 2 && $rest->get("domain_change") == 1){
	if(isset($_SERVER["HTTP_REFERER"])&& Dnt::in_string(DOMAIN, $_SERVER["HTTP_REFERER"])){
		$session->set("admin_logged", "1");
		$session->set("admin_id",$rest->get("admin_id"));
		AdminUser::updateDatetime(Vendor::getId(), $rest->get("admin_id"));
	}
	$dnt->redirect(WWW_PATH_ADMIN."?src=".DEFAULT_MODUL_ADMIN);
}
else{
	if($session->get("admin_logged")){
		$dnt->redirect(WWW_PATH_ADMIN."?src=".DEFAULT_MODUL_ADMIN);
	}else{
		include "tpl.php";
	}
}


