<?php
$time_start = microtime(true);
include "../globals.php";
include	"../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);

$vendor = new Vendor;
$db = new Db;

$metas = array(
	array(
		"type"			=> 	"",
		"key"			=> 	"still_redirect_to_domain",
		"value" 		=> 	"",
		"content_type" 	=> 	"bool",
		"description" 	=> 	"Vždy presmerovať web na reálnu url adresu, a to aj vtedy, ak sa nachádza v testovacom móde.",
		"order" 		=> 	"0",
		"show" 			=> 	"1",
	),
);

$query1 = "INSERT INTO `dnt_settings` (`id`, `id_entity`, `type`, `key`, `value`, `content_type`, `description`, `vendor_id`, `order`, `show`) VALUES ";
foreach ($vendor->getAll() as $row) {
	foreach($metas as $meta){
		$data[] = "(NULL, '0', '".$meta['type']."', '".$meta['key']."', '".$meta['value']."', '".$meta['content_type']."', '".$meta['description']."', '".$row['id']."', '".$meta['order']."', '".$meta['show']."')";
	}
	
}
$data = implode(",", $data);
$query = $query1.$data;
$db->dbTransaction();
$db->query($query);
$db->query("UPDATE `dnt_settings` SET `id_entity` = `id` WHERE `id_entity` = 0");
$db->dbCommit();
