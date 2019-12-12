<?php
$email 		= base64_decode(urldecode($rest->get("email")));
$vendorId 	= base64_decode(urldecode($rest->get("vendor")));
$datetime 	= base64_decode(urldecode($rest->get("datetime")));
$datetime_update = AdminUser::dataById("admin", "datetime_update", $email);
$d1 = new DateTime($datetime);
$d2 = new DateTime($datetime_update);

if(isset($_POST['sent'])){
	
	$pass = $rest->post("password");
	$re_pass = $rest->post("re_password");
	$p_email = $rest->post("email");
	
	
	if($vendorId == Vendor::getId()){
		if($pass == $re_pass){
			if($email == $p_email){
				if(AdminUser::emailExists($email, $vendorId)){
					if($d1 > $d2){
						AdminUser::updatePassword($vendorId, $email, $pass);
						AdminUser::updateDatetime(Vendor::getId(), $email);
						$message = 'Vaše heslo sa úspešne zmenilo, môžete sa prihlásiť novým heslom.
						<br/><br/><a href="index.php?src=login"><h3><strong>Prejsť na Login</strong></h3></a>';
						$errTitle	= "Heslo úspešne zmenené";
					}else{
						$message =  "Heslo nie je možné zmeniť. Čas na zmenu vypršal, alebo bolo heslo opätovne použité.";
						$errTitle	= "Chyba";
					}
				}else{
					$message =  "Email, ktorý ste zadali sa v databáze nenachádza.";
					$errTitle	= "Chyba";
				}
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


errorAccess($errTitle,$message);