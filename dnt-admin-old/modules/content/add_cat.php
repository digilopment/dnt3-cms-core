<?php

$db = new Db;


$post_id = $rest->get("post_id");
$redirect = $rest->post("return");

$name = $rest->post("name");
$name_url = Dnt::name_url($name);
$admin_cat = $rest->post("admin_cat");

if($name != ""){
	if($admin_cat == "post"){
		$cat_id = 3;
		$sub_cat_id = 0;
	}elseif($admin_cat == "article"){
		$cat_id = 2;
		$sub_cat_id = 0;
	}

	$insertedData = array(
		'cat_id' 			=> $cat_id, 
		'sub_cat_id' 		=> $sub_cat_id, 
		'`name_url`' 		=> $name_url, 
		'`admin_cat`' 		=> $admin_cat, 
		'name' 				=> $name,
		'`show`' 			=> '1',
		'`order`' 			=> '0',
		'vendor_id' 		=> Vendor::getId(), 
	);

	$db->insert('dnt_post_type', $insertedData);
	
}
$dnt->redirect($redirect);
