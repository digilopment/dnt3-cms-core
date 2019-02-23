<?php
//include "autoload.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$dntMailer = new Mailer;

$senderEmail	= "test@winprizes.eu";
$recipientEmail	= "thomas.doubek@gmail.com";
$msg			= "Správa bola úspešne odoslaná"; 
$messageTitle	= "Registrace do soutěže"; 

			
$dntMailer->set_recipient(array($recipientEmail));
$dntMailer->set_msg($msg);
$dntMailer->set_subject($messageTitle);
$dntMailer->set_sender_name($senderEmail);
$dntMailer->set_sender_email($senderEmail);
$dntMailer->sent_email();
			