<?php
$rest = new Rest;
$session = new Sessions;
$dnt = new Dnt;
$adminUser = new AdminUser;

if($rest->get("action") == 1){
	if(isset($_POST['sent'])){
		$email = $rest->post("email");
		$pass = $rest->post("pass");
		if($adminUser->validProcessLogin($email, $pass)){
			$session->set("admin_logged", "1");
			$session->set("admin_id",$email);
		}
	}
	$dnt->redirect(WWW_PATH_ADMIN."?src=".DEFAULT_MODUL_ADMIN);
}
else{
	include "tpl.php";
}


