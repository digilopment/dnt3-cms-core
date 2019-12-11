<?php
if(isset($_POST['sent'])){
		
		$user = new User;
		$return = $user->addDefaultUser();
		
		include "plugins/webhook/tpl_functions.php";
		get_top();
		include "plugins/webhook/top.php";
		getConfirmMessage($return, "<br/>Údaje sa úspešne uložili ");
		include "plugins/webhook/bottom.php";
		get_bottom();
		
}else{
	$dnt->redirect(WWW_PATH_ADMIN_2."?src=".DEFAULT_MODUL_ADMIN);
}