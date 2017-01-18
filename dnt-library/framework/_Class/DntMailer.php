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
			$predmet = Dnt::odstran_diakritiku($this->subject);
		}
		
		//OD MENO
		if($this->sender_name == false){
			$od_meno = DEFAULT_NAME;
		}
		else{
			$od_meno = Dnt::odstran_diakritiku($this->sender_name);
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
		
		
		if(SEND_EMAIL_VIA == "internal"){
			mail($to, $subject, $message, $headers);
		}
		elseif(SEND_EMAIL_VIA == "send_grid"){
			$js = array(
			'sub' => array(':name' => array('Elmer')),
			'filters' => array('templates' => array('settings' => array('enable' => 1, 'template_id' => SEND_GRID_API_TEMPLATE_ID)))
			);

			$params = array(
				'to'        => $to,
				'toname'    => $to,
				'from'      => $od_email,
				'fromname'  => $od_meno,
				'subject'   => $predmet,
				'text'      => Dnt::not_html($email_sprava),
				'html'      => $email_sprava,
				'x-smtpapi' => json_encode($js),
			);
			
			// Generate curl request
			$session = curl_init(SEND_GRID_API_REQUEST);
			// Tell PHP not to use SSLv3 (instead opting for TLS)
			//curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
			curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . SEND_GRID_API_KEY));
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
		
		
	}
	
	
	public function sent_email(){
		foreach($this->recipient as $to){
			$this->prepare_mail($to);
		}
	}
	
}