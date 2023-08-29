<?php

use DntLibrary\Base\Mailer;

if (isset($_POST['sent'])) {
    $email = $rest->post('email');
    $vendorId = $vendor->getId();
    if ($adminUseremailExists($email, $vendorId)) {
        $changePasswordUrl = WWW_PATH . '' . ADMIN_URL_2 . '/index.php?src=forgotten-password&action=confirm&email=' . urlencode(base64_encode($email)) . '&vendor=' . urlencode(base64_encode($vendorId)) . '&datetime=' . urlencode(base64_encode($dnt->datetime()));

        //echo base64_decode(urldecode(    urlencode(base64_encode($email))    ));
        //echo $changePasswordUrl;
        //exit;
        $msg = '
		<html>
		<body>
		<h3>Dobrý deň,<br/>
		dostali sme žiadosť o obnovu hesla v System Designdnt 3</h3>
		<p>Ak si prajete zmeniť Vaše heslo, prosím kliknite <a target="_blank" href="' . $changePasswordUrl . '"><h3>na zmenu hesla</h3></a>. 
		Ak si heslo neželáte obnoviť, tento email prosím ignorujte.</p>
		</body>
		</html>
		';

        $senderEmail = 'no-reply@designdnt.sk';
        $messageTitle = 'Designdnt 3 - obnova hesla';

        $dntMailer = new Mailer();
        $dntMailer->set_recipient(array($email));
        $dntMailer->set_msg($msg);
        $dntMailer->set_subject($messageTitle);
        $dntMailer->set_sender_name($senderEmail);
        $dntMailer->sent_email();

        $message = 'Žiadosť o zmenu hesla bola poslaná na Váš email: <strong>' . $email . '</strong>';
        $errTitle = 'Žiadosť odoslaná';
    } else {
        $message = 'Ľutujeme, ale žiadosť nie je možné odoslať. Email, ktorý ste zadali neexistuje.';
        $errTitle = 'Chyba';
    }
} else {
    $message = 'Ľutujeme, ale táto požiadavka nebola korektne spracovaná.';
    $errTitle = 'Chyba';
}

errorAccess($errTitle, $message);
