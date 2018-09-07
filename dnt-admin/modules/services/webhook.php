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


/*
$dbQuery = $webhook->services(0);
$dbService = $webhook->services(0, true);
$db->query($dbService['config']['sql']." ".$dbQuery[$services]['sql']);

$query = "SELECT * FROM dnt_posts_meta WHERE 
	`id_entity` = '0' AND 
	`service` = '$serviceCheck' ORDER BY id asc";

	$queryCheck = "SELECT * FROM dnt_posts_meta WHERE 
				`id_entity` = '$idEntityCheck' AND 
				`service` = '$serviceCheck' ORDER BY id asc";
				
foreach ($db->get_results($query) as $row) {
	foreach ($db->get_results($queryCheck) as $rowCheck) {
		if($row['id_entity'] == 0 && $row['key'] == $rowCheck['key']){
			$arr[] = $row['id'];
		}
	}
}

$IN = implode(",",$arr);

$query = "SELECT * FROM dnt_posts_meta WHERE 
	`id` NOT IN ($IN) AND
	`id_entity` = '0' AND 
	`service` = '$serviceCheck' ORDER BY id asc";
foreach ($db->get_results($query) as $row) {
	//echo $row['id'];
	$insertedData = array(
		'`id_entity`' 	=> $idEntityCheck,
		'`service`' 		=> $row['service'],
		'`vendor_id`' 	=> Vendor::getId(),
		'`key`' 			=> $row['key'],
		'`value`' 		=> $row['value'],
		'`description`' 	=> $row['description'],
		'`show`' 			=> $row['show'],
	);
	$db->insert('dnt_posts_meta', $insertedData);	
}	

$db->query("DELETE FROM dnt_posts_meta WHERE id_entity = '0'");
*/

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
			$db->query($dbService['config']['sql']." ".$dbQuery[$services]['sql']);
			
		}
		//$postMeta->setApproval($idEntityCheck, $serviceCheck);
		$postMeta->homogen();
		include "tpl.php";
		
	}
}