<?php
$rest 		= new Rest;
$service 	= new Sessions;
$webhook 	= new Webhook;
$db 		= new Db;
$article	= new ArticleView;
$postMeta	= new PostMeta;

$postId 	= $rest->get("post_id");
$services 	= $rest->get("services");



$idEntityCheck 	= $postId ;
$serviceCheck 	= $services;


/** 
	HOMOGEN POST META
	VYPNUTE KVOLI VYKONU
**/
$serviceName = $services;
//include "tpl.php";

if($rest->get("action") == "update")
{
	include "update.php";
}
else{
	include "tpl.php";
}





exit;
foreach($webhook->services() as $key=>$serviceIndex){
	if($key == $services){
		
		//$serviceUrl 	= $serviceIndex['service'];
		$serviceName 	= $serviceIndex['service_name'];
		
		//--------------------MODULE INSERT------------------------//
		$query = "SELECT * FROM dnt_posts_meta WHERE 
		`id_entity` = '".$postId."' AND 
		`service` = '$services' AND 
		`vendor_id` = '" . Vendor::getId() . "'";
		
		if (!$db->num_rows($query) > 0) {
			
			//INSERT DEFAULT MODULE META
			$dbQuery = $webhook->services($postId);
			$dbService = $webhook->services($postId, true);
			
			//var_dump($dbService['config']['sql']." ".$dbQuery[$services]['sql']);
			//exit;
			if($dbQuery[$serviceCheck]['sql']){
				$db->query($dbService['config']['sql']." ".$dbQuery[$services]['sql']);
			}
			
		}
		//$postMeta->setApproval($idEntityCheck, $serviceCheck);
		$postMeta->homogen();
		include "tpl.php";
		
	}
}

