<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$rest = new Rest;
$mailer = new Mailer;
$mail = new Dnt;
$data = Frontend::get();
$db   = new Db;

if($rest->post("sent_msg")){
	
	$predmet 	= "".$rest->post("predmet");
	$meno 		= "".$rest->post("meno");
	$priezvisko = "".$rest->post("priezvisko");
	$firma 		= "".$rest->post("firma");
	$email 		= "".$rest->post("email");
	$tel_c 		= "".$rest->post("tel_c");
	$ulica 		= "".$rest->post("ulica");
	$psc 		= "".$rest->post("psc");
	$mesto 		= "".$rest->post("mesto");
	$produkt 	= "".$rest->post("produkt");
	$od_meno 	=  "Osmos - ".$predmet;
	$sprava 	= $rest->post("sprava");
	
	
	
	$msg = "
	<h3>".$predmet."</h3><br/>
	<b>Meno:</b>".$meno." ".$priezvisko."<br/>
	<b>Adresa:</b>".$ulica.", ".$psc.", ".$mesto."<br/>
	<b>Telefón:</b>".$tel_c."<br/>
	<b>Email:</b>".$email."<br/>
	<b>Firma:</b>".$firma."<br/>
	<b>Produkt:</b>".$produkt."<br/><br/>
	
	
	<b>SPRÁVA</b>:
	".$sprava."<br/><br/><b>Kontaktný email odosielateľa: <a href=\"mailto:".$email."\">".$email."</a></b>";
	
	/* if($produkt == 1){ //solidcam
		$mailer->set_recipient(
			array(
				"ivan.uhliar@osmos.sk",
				"lukas.korenko@osmos.sk",
				"thomas.doubek@gmail.com",
				)
			);
		}
	elseif($produkt == 2){ //pdc
		$mailer->set_recipient(
			array(
				"ivan.uhliar@osmos.sk",
				"roman.furo@osmos.sk",
				"thomas.doubek@gmail.com",
				)
			);
		}
	elseif($produkt == 3){ //vyskum a vzvoj
		$mailer->set_recipient(
			array(
				"ivan.uhliar@osmos.sk",
				"marian.zimmermann@osmos.sk",
				"thomas.doubek@gmail.com",
				)
			);
		}
	elseif($produkt == 4){ //lisovanie plastov
		$mailer->set_recipient(
			array(
				"ivan.uhliar@osmos.sk",
				"marian.zimmermann@osmos.sk",
				"jan.kollar@osmos.sk",
				"thomas.doubek@gmail.com",
				)
			);
		}
	elseif($produkt == 5){ //nastrojaren
		$mailer->set_recipient(
			array(
				"ivan.uhliar@osmos.sk",
				"marian.zimmermann@osmos.sk",
				"lukas.korenko@osmos.sk",
				"thomas.doubek@gmail.com",
				)
			);
		}
	elseif($produkt == 6){ //kontakt
		$mailer->set_recipient(
			array(
				"lukas.korenko@osmos.sk",
				"thomas.doubek@gmail.com",
				)
			);
		}
	elseif($produkt == 7){ //vyroba
		$mailer->set_recipient(
			array(
				"thomas.doubek@gmail.com",
				)
			);
		}else{
			$mailer->set_recipient(
			array(
				"thomas.doubek@gmail.com",
				"lukas.korenko@osmos.sk",
				)
			);
		}
	*/
	
	$mailer->set_recipient(
		array(
			"thomas.doubek@gmail.com",
			)
		);
				
	$mailer->set_msg($msg);
	$mailer->set_subject($predmet);
	$mailer->set_sender_name($od_meno);
	$mailer->sent_email();
	
	$name = $produkt. " - ".$predmet.", ".$meno." ".$priezvisko;
	//Zapíše dáta do postov
	$insertedData = 
	array(
		'vendor_id' 		=> Vendor::getId(), 
		'cat_id' 			=> "302", 
		'sub_cat_id' 		=> "", 
		'`type`' 			=> "post", 
		'datetime_creat' 	=> Dnt::datetime(),
		'datetime_update' 	=> Dnt::datetime(),
		'datetime_publish' 	=> Dnt::datetime(),
		'name' 				=> $name,
		'name_url' 			=> Dnt::name_url($name),
		'content' 			=> $msg,
		'`show`' 			=> '0' 
	);
	$db->insert('dnt_posts', $insertedData);
	//echo $msg;
	$RESPONSE = 1;
}else{
	$RESPONSE = 0;
}

echo '
    {
      "success": "'.$RESPONSE.'",
      "request": "POST (via AJAX)",
      "response": "'.$RESPONSE.'",
      "protokol": "REST",
      "generator": "Designdnt 3",
      "service": "rpc/api/json/ajax-ziadost",
      "message": "Silence is golden, speech is gift :)"
    }';