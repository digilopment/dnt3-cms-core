<?php
if(isset($_POST['sent'])){
	$session = new Sessions;
	
	$subject	= $rest->post("subject");
	$template 	= $rest->post("template");
	$cat_id 	= $rest->post("users");
	$message 	= $rest->post("message");
	
	$session->set("subject", $subject);
	$session->set("template", $template);
	$session->set("cat_id", $cat_id);
	$session->set("message", $message);
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

if($next_id){
	include "tpl_functions.php";
	$dntMailer		= new Mailer;
	$sender_email	= dnt::getPostParam("dnt_mailer_mails", "email", $post_id);
	$msg 			= $session->get("message");
	$heading 		= $session->get("subject");
	$to_finish		= $sending_mail - $sended_mails;

	$dntMailer->set_recipient(array($sender_email));
	$dntMailer->set_msg($msg);
	$dntMailer->set_subject($heading);
	$dntMailer->set_sender_name($heading);
	$dntMailer->sent_email();
	tpl_sending_mails($to_finish, $sender_email, $next_id);
}else{
	include "tpl_functions.php";
	$session->remove("cat_id");
	$session->remove("subject");
	$session->remove("template");
	$session->remove("message");
	tpl_sending_finish($sending_mail );
}