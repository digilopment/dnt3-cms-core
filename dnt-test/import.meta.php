<?php

include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);

$db = new Db;
$postId = 13575;


function idToService(){
	
	return array(
		"1" => "wp_settings",
		"2" => "wp_hotely",
		"3" => "wp_regiony",
		"12"=> "wp_formular",
	);
		
		
		/**
		
		"12"= > "wp_o_sutazi",
		"12"= > "wp_galeria",
		"12"= > "wp_mapa",
		"12"= > "wp_partner",
		) **/
	
}

$srv = idToService();

$IN = "INSERT INTO `dnt_posts_meta` (`id`, `id_entity`, `service`, `vendor_id`, `key`, `value`, `content_type`, `cat_id`, `description`, `show`) VALUES";
$q = "SELECT * FROM `dnt_microsites_composer` WHERE competition_id = 40";

$DATA = $IN;
foreach ($db->get_results($q) as $row) {
	if(isset($srv[$row['cat_id']])){
		$DATA .= "(null, $postId, '".$srv[$row['cat_id']]."', '" . Vendor::getId() . "', '".$row['meta']."', '".$row['value']."', '".$row['content_type']."', '".$row['cat_id']."', '".$row['description']."', 1),";
	}		
}

echo $DATA;

exit;