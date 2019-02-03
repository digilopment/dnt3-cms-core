<?php

class Voucher{
	
	protected function sentEmail($recipientEmail, $voucherValue){
		
		
		$data 			= Frontend::get();
		$senderEmail 	= $data['meta_settings']['keys']['notifikacny_email']['value'];
		$messageTitle 	= "Zľavový kód na Skipas";
		$msg			= 'Dobrý deň, prednedávnom ste sa zapojili do súťaže  na www stránke <b>http://markiza.localhost/dnt3/</b>. Vyžrebovali sme Vás z pomedzi súťažiacich. Vás kód môžete použiť v Lyžiarskom stredisku <b>Zell Am See</b>.<br><br/>
		Váš kupón: <h3>'.$voucherValue.'<h3>';
		
		$dntMailer	= new Mailer;
		$dntMailer->set_recipient(array($recipientEmail));
		$dntMailer->set_msg($msg);
		$dntMailer->set_subject($messageTitle);
		$dntMailer->set_sender_name($senderEmail);
		$dntMailer->sent_email();
		
	}
	
	public function assignLastVoucher($userId){
		$db = new Db;
		
		$db->dbTransaction();
		$query = "SELECT * FROM dnt_vouchers WHERE user_id = '0' ORDER BY `order` ASC LIMIT 1";
		$v_value 		= false;
		$v_id_entity 	= false;
		if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $v_value 		= $row['value'];
                $v_id_entity 	= $row['id_entity'];
				$voucherData	= $v_value . ";" . $v_id_entity;
            }
        }
		
		//AK JE ESTE VOLNY VOUCHER
		if($v_id_entity){
			$user = User::getUser($userId);
			if($user[0]['voucher'] == ""){
				//UPDATE USER
				$db->update(
					"dnt_registred_users",	//table
					array(	//set
						'voucher'			=> $voucherData,
						'datetime_update' 	=> Dnt::datetime(),
						), 
					array( 	//where
						'id_entity' 		=> $userId,
						'vendor_id'			=> Vendor::getId(),
					)
				);
				
				//UPDATE VOUCHERS
				$db->update(
					"dnt_vouchers",	//table
					array(	//set
						'user_id'			=> $userId,
						'datetime_update' 	=> Dnt::datetime(),
						), 
					array( 	//where
						'id_entity' 		=> $v_id_entity,
						'vendor_id'			=> Vendor::getId(),
					)
				);
				
				//ODOSLAT EMAIL
				self::sentEmail($user[0]['email'], $v_value);
			}
			$return = true;
		}else{
			$return = false;
		}
		$db->dbCommit();
		return $return;		
	}
	
	
}