<?php
$rest = new Rest;
$session = new Sessions;
$dnt = new Dnt;

if($rest->get("action") == 1){
	$session->set("admin_logged", "1");
	$session->set("admin_id", "thomas.doubek@gmail.com");
	$dnt->redirect(WWW_PATH_ADMIN."?src=".DEFAULT_MODUL_ADMIN);
}
else{
	if($session->get("admin_logged")){
		$dnt->redirect(WWW_PATH_ADMIN."?src=".DEFAULT_MODUL_ADMIN);
	}else{
		include "tpl.php";
	}
}


