<?php

include "../dnt-library/framework/_Class/Autoload.php";
$autoload = new Autoload;
$path = "../";
$autoload->load($path);
$dntMailer = new Mailer;

$senderEmail = "no-reply@markiza.sk";
$recipientEmail = "doubek.tomas@markiza.sk";
$messageTitle = "Formulár Bona";

$msg = "<html><head></head><body>
		
		<h3>Kontaktné údaje</h3>
		<b>Formulár:</b>: Formulár Bona<br/>
		<b>Meno</b>: Tatiana <br/>
		<b>Priezvisko</b>: Opátová<br/>
		<b>Email</b>: tatianaopatova@gmail.com<br/>
		<b>Tel.č</b>: 0908132726<br/>
		<b>Správa</b>:       MŠ-Veľké Bedzany - sme malá jednotriedka, umiestnená v starej budove, kde už všetko končí svoju životnosť.Linoleum v MŠ je v dosť zlom stave.Deti sa niekde naň kopcú, teda nielen po tej estetickej stránke to vyzerá zle, ale aj z hladiska bezpečnosti. Máme deti od 2,5r, ktoré si nevedia dávat taký pozor pri chôdzi či občas aj behu....Aj my by sme si našu materskú školu rady skultúrnili, zútulnili a urobili ju bezpečnejšou pre naších drobcov. 
S pozdravom
                                          Tatiana Opátová, riaditeľka MŠ<br/>
		<br/>
		<a href='http://storage.services.markiza.sk/dnt-markiza/dnt-system/data/25/uploads/45_e972e8e180eef620f5662a83ae4a0f7a_o.jpg' >45_e972e8e180eef620f5662a83ae4a0f7a_o.jpg</a>
		</body>
	</html>";
$dntMailer->set_recipient(array($recipientEmail));
$dntMailer->set_msg($msg);
$dntMailer->set_subject($messageTitle);
$dntMailer->set_sender_name($senderEmail);
$dntMailer->set_sender_email($senderEmail);
$dntMailer->sent_email();

echo rand(0, 999);
