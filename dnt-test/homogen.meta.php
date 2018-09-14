<?php

include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);

$db = new Db;
$webhook = new Webhook;
$postMeta = new PostMeta;
$postId = 13575;
$services = "wp_hotely";


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
			
			if($dbQuery[$services]['sql']){
				$db->query($dbService['config']['sql']." ".$dbQuery[$services]['sql']);
			}
			
		}
		$postMeta->setApproval($postId, $services);
		$postMeta->homogen();
		
	}
}