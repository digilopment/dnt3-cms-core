<?php
$email 		= base64_decode(urldecode($rest->get("email")));
$vendorId 	= base64_decode(urldecode($rest->get("vendor")));

if(isset($_POST['sent'])){
	
	$pass = $rest->post("password");
	$re_pass = $rest->post("re_password");
	$p_email = $rest->post("email");
	
	
	if($vendorId == Vendor::getId()){
		if($pass == $re_pass){
			if($email == $p_email){
				AdminUser::updatePassword($vendorId, $email, $pass);
				$message = 'Vaše heslo sa úspešne zmenilo, môžete sa prihlásiť novým heslom.
				<br/><br/><a href="index.php?src=login"><h3><strong>Prejsť na Login</strong></h3></a>';
				$errTitle	= "Heslo úspešne zmenené";
			}else{
				$message =  "Email, ktorý ste zadali sa nezhoduje s emailom, na ktorý ste dostali žiadosť o zmenu hesla.";
				$errTitle	= "Chyba";
			}
		}else{
			$message =  "Vaše heslá sa nezhodujú.";
			$errTitle	= "Chyba";
		}
	}else{
		$message =  "Vaše ID sa nezhoduje s ID o zmenu hesla";
		$errTitle	= "Chyba";
	}
}else{
	$message =  "Nekorektný vstup";
	$errTitle	= "Chyba";
}

include "tpl_functions.php";
errorAccess($errTitle,$message);