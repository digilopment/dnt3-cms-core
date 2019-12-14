<?php
if(isset($_POST['sent'])){
	$session = new Sessions;
	
	$subject	= $rest->post("subject");
	$cat_id 	= $rest->post("users");
	
	$template 	= $rest->post("template");
	$message 	= $rest->post("message");
	$url_external= $rest->post("url_external");
	
	if($rest->post("template") != ""){
		$content = $rest->post("template");
	}
	if($rest->post("url_external") != ""){
		$content = file_get_contents($rest->post("url_external"));
	}
	if($rest->post("message") != ""){
		$content = $rest->post("message");
	}
	
	$session->set("content", $content);
	$session->set("cat_id", $cat_id);
	$session->set("subject", $subject);
}

$table 	= "dnt_mailer_mails";
$cat_id = $session->get("cat_id");

$query = "SELECT * FROM dnt_mailer_mails WHERE cat_id = '".$cat_id."' AND vendor_id = '".Vendor::getId()."'  AND `show` = 1";
$sending_mail = $db->num_rows($query);
	
if(isset($_GET['mail_id'])){
	$post_id = $rest->get("mail_id");
	$next_id = dnt::db_next_id($table, "AND cat_id = '".$cat_id."' AND `show` = 1", $post_id);
}else{
	$post_id = dnt::db_current_id($table, "AND cat_id = '".$cat_id."'  AND `show` = 1");
	$next_id = dnt::db_next_id($table, "AND cat_id = '".$cat_id."'  AND `show` = 1", $post_id);
}

$query = "SELECT * FROM dnt_mailer_mails WHERE cat_id = '".$cat_id."' AND vendor_id = '".Vendor::getId()."' AND id_entity <= '$post_id'  AND `show` = 1";
$sended_mails = $db->num_rows($query);

if($post_id){
	
	$dntMailer		= new Mailer;
	$sender_email	= str_replace(" ", "", dnt::getPostParam("dnt_mailer_mails", "email", $post_id));
	$msg 			= $session->get("message");
	$template 		= $session->get("template");
	$subject 		= $session->get("subject");
	$content 		= $session->get("content");
	$to_finish		= $sending_mail - $sended_mails;

	$dntMailer->set_recipient(array($sender_email));
	
	//KLIENTI MARKIZA JAR 2019
	$title = dnt::getPostParam("dnt_mailer_mails", "title", $post_id) ." ".dnt::getPostParam("dnt_mailer_mails", "name", $post_id)." ".dnt::getPostParam("dnt_mailer_mails", "surname", $post_id);
	$title = str_replace("Pán", "Vážený pán", $title);
	$title = str_replace("Pani", "Vážená pani", $title);
	$content = str_replace("Vážení klienti, milí priatelia", $title, $content);
	$title = str_replace("Vážený pán", "Dear Mr.", $title);
	$title = str_replace("Vážená pani", "Dear Mrs.", $title);
	$content = str_replace("Dear clients, dear friends", $title, $content);
	
	$dntMailer->set_msg($content);
	$dntMailer->set_subject($subject);
	$dntMailer->set_sender_name(false);
	$dntMailer->sent_email();
	tpl_sending_mails($to_finish, $sender_email, $next_id);
}else{
	
	$session->remove("cat_id");
	$session->remove("subject");
	$session->remove("template");
	$session->remove("message");
	tpl_sending_finish($sending_mail);
}