<?php
//include "autoload.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$vendor 		= new Vendor;

/** 
 *
 *EXPORT DATA TO CSV
 *
 *
**/

function creatCsvFileStatic($table, $columns, $where, $fileName, $columnsName = false) {
	$db = new DB();
	$data = false;
	$data = chr(0xEF) . chr(0xBB) . chr(0xBF); //diakritika pod UTF 8
	$query = "SELECT $columns FROM $table WHERE parent_id = 0 $where";
	if ($db->num_rows($query) > 0) {
		$data .= str_replace(" ", ";", $columns);
		
		if($columnsName){
			$data .= str_replace(",",";",$columnsName) . "\n";
		}else{
			$data .= str_replace(" ", ";", $columns);
		}
		
		$data .= "\n";
		foreach ($db->get_results($query) as $row) {
			$data .= $row['id_entity'] . ";" . $row['vendor_id'] . ";" . $row['name'] . ";" . $row['surname'] . ";" . $row['session_id'] . ";" . $row['mesto'] . ";" . $row['psc'] . ";" . $row['email'] . ";" . $row['content'] . ";" . $row['news'] . ";" . $row['news_2'] . ";" . $row['perex'] . ";" . $row['podmienky']. "\n";
		}
	}
	
	if(!is_readable(dirname($fileName))){
		Dnt::rmkdir(dirname($fileName));
	}
	file_put_contents($fileName, $data);
}

$date_time_format = date("d")."-".date("m")."-".date("Y");

//DEFAULT CONFIG
$columns 		= "id_entity, vendor_id, name, surname, session_id, mesto, psc, email, content, news, news_2, perex, podmienky";
$columnsName 	= "id, competition_id, meno, priezvisko, unique_id, mesto, psc, email, odpoved, news, news_2, fotka, podmienky";
$table 			= "dnt_registred_users";

//ALL EXPORTS
$where 			= "AND status > 0";
$fileName		= "../dnt-view/data/uploads/generated-files/".$date_time_format."/all_competitors.csv";
creatCsvFileStatic($table, $columns, $where, $fileName, $columnsName);

//CURRENT COMPETITOR EXPORT
foreach ($vendor->getAll() as $row) {
	$where 			= "AND status > 0 AND vendor_id = '".$row['id']."'";
	$fileName		= "../dnt-view/data/uploads/generated-files/".$date_time_format."/competition_".$row['id']."_competitors.csv";
	creatCsvFileStatic($table, $columns, $where, $fileName, $columnsName);
}
			