<?php
if(isset($_POST['sent'])){
	$session = new Sessions;
	
	$subject	= $rest->post("subject");
	$template 	= $rest->post("template");
	$cat_id 	= $rest->post("users");
	$message 	= $rest->post("message");
	$url_external= $rest->post("url_external");
	
	$session->set("subject", $subject);
	$session->set("template", $template);
	$session->set("cat_id", $cat_id);
	$session->set("message", $message);
	$session->set("url_external", $url_external);
}

$table 	= "dnt_mailer_mails";
$cat_id = $session->get("cat_id");

$query = "SELECT * FROM dnt_mailer_mails WHERE cat_id = '".$cat_id."' AND vendor_id = '".Vendor::getId()."'";
$sending_mail = $db->num_rows($query);
	
if(isset($_GET['mail_id'])){
	$post_id = $rest->get("mail_id");
	$next_id = dnt::db_next_id($table, "AND cat_id = '".$cat_id."'", $post_id);
}else{
	$post_id = dnt::db_current_id($table, "AND cat_id = '".$cat_id."'");
	$next_id = dnt::db_next_id($table, "AND cat_id = '".$cat_id."'", $post_id);
}

$query = "SELECT * FROM dnt_mailer_mails WHERE cat_id = '".$cat_id."' AND vendor_id = '".Vendor::getId()."' AND id_entity <= '$post_id'";
$sended_mails = $db->num_rows($query);

if($post_id){
	include "tpl_functions.php";
	$dntMailer		= new Mailer;
	$sender_email	= dnt::getPostParam("dnt_mailer_mails", "email", $post_id);
	$msg 			= $session->get("message");
	$template 		= $session->get("template");
	$heading 		= $session->get("subject");
	$to_finish		= $sending_mail - $sended_mails;

	$dntMailer->set_recipient(array($sender_email));
	
	if($session->get("message") != "NULL"){
		$content =  $session->get("message")."";
	}
	if($session->get("url_external") != "NULL"){
		$content =  file_get_contents($session->get("url_external"));
	}
	if($session->get("template") != "NULL"){
		$content =  $session->get("template")."";
	}
	$dntMailer->set_msg($content);
	$dntMailer->set_subject($heading);
	$dntMailer->set_sender_name(false);
	$dntMailer->sent_email();
	tpl_sending_mails($to_finish, $sender_email, $next_id);
}else{
	include "tpl_functions.php";
	$session->remove("cat_id");
	$session->remove("subject");
	$session->remove("template");
	$session->remove("message");
	tpl_sending_finish($sending_mail);
}