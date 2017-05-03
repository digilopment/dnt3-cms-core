<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
error_reporting(0);

$rest 		= new Rest;
$mailer 	= new Mailer;
$mail 		= new Dnt;
$session 	= new Sessions;
$db   		= new Db;
$dntLog		= new DntLog;

$key 		= $rest->get('type');
$f_no_robot = $rest->get('no_robot');
$b_no_robot = $session->get('no_robot'); //$_SESSION['no_robot'];
$hash 		= $rest->post('form_id');
$id 		= Meta::competitionIdByHash($hash);
$F_captcha  = $rest->post('captcha');
$B_captcha  = $_SESSION['captcha']; //$_SESSION['captcha'];

if (Meta::is_form_valid($hash, $key)){
	if($f_no_robot == $b_no_robot){
		if($F_captcha  == $B_captcha){
			
			
			//BEGIN
				$uniq_id = false;
				$msg = false;
				$nazov = false;
				if(Meta::getCompetitionMetaByInput('_email_conf_char', $id)){
					$uniq_id 	= uniqid();	
					$msg 		= Meta::getCompetitionMetaByInput('_email_conf_sent_text', $id)."<br/><br/> code: <b>".$uniq_id."</b>";
				}
				else{
					$uniq_id 	= false;	
					$msg 		= Meta::getCompetitionMetaByInput('_email_conf_sent_text', $id)."";
				}

				$nazov 		= Meta::getCompetitionColumnByInput("nazov", $id);

				
				$name 		= $rest->post('form_base_name');
				$surname 	= $rest->post('form_base_surname');
				$psc 		= $rest->post('form_base_psc');
				$city 		= $rest->post('form_base_city');
				$email 		= $rest->post('form_base_email');
				$tel_c 		= $rest->post('form_base_tel_c');
				$custom_1 	= $rest->post('form_base_custom_1');
				$podmienky 	= 1;
				$news 		= $rest->post('newsletter');
				$news_2 	= $rest->post('newsletter_2');
				$ans 		= $rest->post('ans');
				$ip_adresa 	= Dnt::get_ip();
				
				if(isset($_POST['newsletter'])){
					$news = 1;
				}
				else{
					$news = 0;
				}
				
				if(isset($_POST['newsletter_2'])){
					$news_2 = 1;
				}
				else{
					$news_2 = 0;
				}

			
			$db->query("INSERT INTO `dnt_registred_users`	
					( `vendor_id`, competition_id, typ, `uniq_id`, `meno`, `priezvisko`, `psc`, `tel_c`, `custom_1`, `mesto`, `email`, podmienky, news, news_2, odpoved, datum_den, datum_mesiac, datum_rok, cas, ip_adresa) 
						VALUES 
					('".Vendor::getId()."', '$id', '$id', '$uniq_id', '$name', '$surname', '$psc', '$tel_c', '$custom_1', '$city', '$email', '$podmienky', '$news', '$news_2', '$ans', '".Dnt::get_den()."','".Dnt::get_mesiac()."','".Dnt::get_rok()."','".Dnt::get_cas()."', '".$ip_adresa."')");
			
						
						
				if(Meta::getCompetitionMetaByInputExists('sent_confirm_mail', $id)){		
					$mailer = new Mailer;
					$mailer->set_recipient(
								array(
									$email,
									)
								);
					$mailer->set_msg($msg);
					$mailer->set_subject($nazov);
					$mailer->set_sender_name($nazov);
					$mailer->sent_email();
				} ///END 
	
				$RESPONSE = 1; //response ok
				$dntLog->add(
				array(
					"http_response" 	=> 200,
					"system_status" 	=> "ajax log - done",
					"msg"				=> "Default Log", 
					)
				);
				session_destroy(); //zrusi session pre opakovane odoslanie formulara*/
			}else{
				$RESPONSE = 2; //no captcha
				$dntLog->add(
				array(
					"http_response" 	=> 200,
					"system_status" 	=> "ajax log - no_captcha",			
					"msg"				=> "No captcha", 
					)
				);
			} 
		}else{
			$RESPONSE = 5; //is robot
							$dntLog->add(
				array(
					"http_response" 	=> 200,
					"system_status" 	=> "ajax log - is_robot",				
					"msg"				=> "Is robot", 
					)
				);
		}
	}else {	
	$RESPONSE = 0; //no post, no valid form
		$dntLog->add(
		array(
			"http_response" 	=> 200,
			"system_status" 	=> "ajax log - no_post",		
			"msg"				=> "No Post", 
			)
		);
}


echo '
	{
	  "success": "'.$RESPONSE.'",
	  "request": "POST",
	  "response": "'.$RESPONSE.'",
	  "protokol": "REST",
	  "generator": "Designdnt 3",
	  "service": "c_dnt-ajax-universal",
	  "ip_addr": "'.Dnt::get_ip().'",
	  "b_captcha": "'.$B_captcha.'",
	  "captcha_max": "'.$_SESSION['captcha_max'].'",
	  "captcha_min": "'.$_SESSION['captcha_min'].'",
	  "test": "'.$_SESSION['test'].'",
	  "meta": "'.Meta::getCompetitionMetaByInput('_email_conf_char', 1).'",
	  "message": "Silence is golden, speech is gift :)"
	}';
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*
	
	
exit;
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
	$od_meno 	= Settings::get("vendor_email")." - ".$predmet;
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
	
	$mailer->set_recipient(
		array(
			Settings::get("vendor_email"),
			)
		);
				
	$mailer->set_msg($msg);
	$mailer->set_subject($predmet);
	$mailer->set_sender_name($od_meno);
	$mailer->sent_email();
	
	$name = $predmet.", ".$meno." ".$priezvisko;
	//Zapíše dáta do postov
	$insertedData = 
	array(
		'vendor_id' 		=> Vendor::getId(), 
		'cat_id' 			=> "306", 
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
	
	*/