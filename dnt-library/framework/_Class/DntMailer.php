<?php
class Mailer{
	
	var $recipient; //array
    var $sender_email; //string
    var $sender_name; //string
    var $title; //string
    var $msg; //string
    var $subject; //string
	
	
    public function __construct(){
		return false;
	}
	
	public function set_recipient($arr){
		$this->recipient = $arr;
	}
	
	public function set_sender_email($str){
		$this->sender_email = $str;
	}
	
	public function set_sender_name($str){
		$this->sender_name = $str;
	}
	
	public function set_title($str){
		$this->title = $str;
	}
	
	public function set_msg($str){
		$this->msg = $str;
	}
	
	public function set_subject($str){
		$this->subject = $str;
	}
	
	
	
	
	public function prepare_mail($to){
		
		//SENDER
		if($this->sender_email == false){
			$od_email = DEFAULT_EMAIL;
		}
		else{
			$od_email = $this->sender_email;
		}
		
		//PREDMET
		if($this->subject == false){
			$predmet = "(no subject)";
		}
		else{
			$predmet = odstran_diakritiku($this->subject);
		}
		
		//OD MENO
		if($this->sender_name == false){
			$od_meno = DEFAULT_NAME;
		}
		else{
			$od_meno = odstran_diakritiku($this->sender_name);
		}
		
		//EMAIL SPRAVA
		if($this->msg == false){
			$email_sprava = false;
		}
		else{
			$email_sprava = $this->msg;
		}
		
		
		//SPOJ DOKPOPY
		$subject = iconv('UTF-8', 'windows-1250',$predmet);
		$title = 'Html Email';
		$message =  iconv('UTF-8', 'windows-1250',$email_sprava);
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=windows-1250' . "\r\n";
		$headers .= 'To:  <'.$to.'>' . "\r\n"; // dalsi mail sa oddeluje ciarkou
		$headers .= 'From: '.$od_meno.' <'.$od_email.'>' . "\r\n";
		
		
		//mail($to, $subject, $message, $headers);
		
		/* send grid begin */
		$url = 'https://api.sendgrid.com/';
		$sendgrid_apikey = "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";
		
		//$sendgrid_apikey = "SG.c5_HrrtXSBCPmbXRPCTsJQ._Yffr2a6nhQGS08WrFc23Jcd24dlWSbjjy-QB_";
		//$template_id = '32ab9b5b-ad8b-45f3-b0c9-e39d736782cc';
		$template_id = 'cb890767-83e8-4824-9c63-bf68435599a8';
		$js = array(
		'sub' => array(':name' => array('Elmer')),
		'filters' => array('templates' => array('settings' => array('enable' => 1, 'template_id' => $template_id)))
		);

		$params = array(
			'to'        => $to,
			'toname'    => $to,
			'from'      => $od_email,
			'fromname'  => $od_meno,
			'subject'   => $predmet,
			'text'      => not_html($email_sprava),
			'html'      => $email_sprava,
			'x-smtpapi' => json_encode($js),
		);
		
		$request =  $url.'api/mail.send.json';

		// Generate curl request
		$session = curl_init($request);
		// Tell PHP not to use SSLv3 (instead opting for TLS)
		//curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
		curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey));
		// Tell curl to use HTTP POST
		curl_setopt ($session, CURLOPT_POST, true);
		// Tell curl that this is the body of the POST
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		// Tell curl not to return headers, but do return the response
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

		// obtain response
		$response = curl_exec($session);
		//var_dump($response, curl_error($session));
		curl_close($session);
		
		//SEND GRID END 
		
		
	}
	
	
	public function sent_email(){
		foreach($this->recipient as $to){
			$this->prepare_mail($to);
		}
	}
	
}