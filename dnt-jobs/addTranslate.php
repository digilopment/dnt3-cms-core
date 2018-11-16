<?php
include "../globals.php";
include	"../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);


$translate_id	= "partneri";
$translate		= "Partneri";

$translate_id	= "pravidla_sutaze";
$translate		= "Pravidlá súťaže";

$translate_id	= "socialne_siete";
$translate		= "Sociálne siete";

	

	


$table = "dnt_translates";
$db = new Db;
$vendor = new Vendor;

foreach ($vendor->getAll() as $vendor) {
$query = MultyLanguage::getLangs(true);
if($db->num_rows($query)>0){
   foreach($db->get_results($query) as $row){
		$insertedData = array(
			'`translate`' 		=> $translate,
			'`lang_id`' 		=> $row['slug'], 
			'`translate_id`' 	=> $translate_id, 
			'`vendor_id`' 		=> $vendor['id'],
			'`type`' 			=> 'static',
			'`table`' 			=> '',
			'`show`' 			=> '1',
			'`parent_id`' 		=> '0',
			
		);
		$db->insert($table, $insertedData);
   }
 }	
}