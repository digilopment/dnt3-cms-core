<?php
/*
if(isset($_POST['sent'])){
	
	//echo "POST";
	$post_id	= $rest->get("post_id");
	$name		= $rest->post("name");
	$surname 	= $rest->post("surname");
	$email 		= $rest->post("email");
	$cat_id 	= $rest->post("cat_id");
	$return 	= $rest->post("return");
	$table 		= "dnt_mailer_mails";

	
	//echo $embed;
	
	 $db->update(
		$table,	//table
		array(	//set
			'name' => $name,
			'surname' => $surname,
			'email' => $email,
			'cat_id' => $cat_id,
			'datetime_update' => Dnt::datetime()
			), 
		array( 	//where
			'id' 			=> $post_id, 
			'`vendor_id`' 	=> Vendor::getId())
	);
	$dnt->redirect($return);
	
}else{
	//$dnt->redirect(WWW_PATH_ADMIN."?src=".DEFAULT_MODUL_ADMIN);
	echo "OK";
}
*/
include "tpl_functions.php";
if(isset($_GET['mail_id'])){
	$mail_id = $rest->get("mail_id");
}else{
	$mail_id = 12;
}
$dntMailer		= new Mailer;
$sender_email	= dnt::getPostParam("dnt_mailer_mails", "email", $mail_id);
$msg 			= "Test Msg content";
$heading 		= "Test Msg";
$sending_mail	= 30;
$sended_mails	= 10;
$to_finish		= 20;
$next_id		= 57;

$dntMailer->set_recipient(array($sender_email));
$dntMailer->set_msg($msg);
$dntMailer->set_subject($heading);
$dntMailer->set_sender_name($heading);
$dntMailer->sent_email();

if($next_id){
	tpl_sending_mails($to_finish, $sender_email, $next_id);
}else{
	tpl_sending_finish();
}



?>
