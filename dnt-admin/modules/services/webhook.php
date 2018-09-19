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
	if($article->getPostsMeta($postId, $rest->get("services"))){
		if(file_exists("../dnt-view/layouts/".Vendor::getLayout()."/modules/".$serviceName."/install/install.php")){
			
			include "../dnt-view/layouts/".Vendor::getLayout()."/modules/".$serviceName."/install/install.php";
			
			$SQL = "INSERT INTO `dnt_posts_meta` (
				`id`, `id_entity`, `post_id`, `service`, `vendor_id`, `key`, `value`, `content_type`, `cat_id`, `description`, `show`
			) VALUES ";
			
			/*** konfiguracne data v subore **/
			$arrayOfDefaultMeta = $article->defaultMetaToArray($postId, $serviceName);
			foreach($arrayOfDefaultMeta as $meta){
				$array1[] = $meta['key'];
			}
			/*** realne data v databaze **/
			foreach($article->getPostsMeta($postId, $rest->get("services")) as $row){
				$array2[] = $row['key'];
			}
			
			$arrayDiff = array_diff($array1, $array2);
			foreach($arrayDiff as $key){
				$db->dbTransaction();
				$Insert = $article->defaultMetaToArray($postId, $serviceName, $key);
				$Insert = str_replace(",", "','", $Insert);
				$query 	= $SQL."('".$Insert."')";
				$query 	= str_replace("'null'", "null", $query);
				$db->query($query);
				$db->query("UPDATE `dnt_posts_meta` SET `id_entity` = `id` WHERE id_entity = 0 AND vendor_id = '".Vendor::getId()."'");
				$db->dbCommit();
			}
			
			
			
		}
		include "tpl.php";
	}else{
		if(file_exists("../dnt-view/layouts/".Vendor::getLayout()."/modules/".$serviceName."/install/install.php")){
			include "add_meta.php";
		}include "tpl_functions.php";
			get_top();
			include "top.php";
			error_message_default("Tento post nemá žiadne meta dáta. <br/>Pre vytvorenie nových meta dát prosím použite konfiguráciu v module.");
			include "bottom.php";
			get_bottom();
	}
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

