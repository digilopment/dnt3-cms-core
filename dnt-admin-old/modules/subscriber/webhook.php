<?php
$url = WWW_PATH."rpc/subscriber/?email=".urlencode(base64_encode("thomas.doubek@gmail.com"))."&vendor_id=".urlencode(base64_encode(Vendor::getId()))."&status=0&id_entity=".urlencode(base64_encode("26"));
echo $url."<br/>";

$email 		= base64_decode(urldecode($rest->get("email")));
$vendor_id 	= base64_decode(urldecode($rest->get("vendor_id")));
$id_entity 	= base64_decode(urldecode($rest->get("id_entity")));
$status 	= $rest->get("status");

if($status == 1){
	$status  = 1;
}else{
	$status = 0;
}

$db = new Db;	
$db->update(
	"dnt_mailer_mails",	//table
	array(	//set
		'show' => $status
		), 
	array( 	//where
		'vendor_id' 	=> $vendor_id, 
		'email' 		=> $email,
		'id_entity' 	=> $id_entity,
	)
);

$errTitle 	= "Zrušenie žiadosti / <strong>o príjmanie newslettrov</strong>";
$errContent = "<strong>Sorry, you do not have a licence to access and use this application in other country.</strong> <br/>This application was built for slovak usage. Please contact slovak support.";
include "tpl.php";
//echo $url;
//echo base64_decode(urldecode($rest->get("email")));