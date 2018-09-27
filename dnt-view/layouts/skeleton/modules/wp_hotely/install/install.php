<?php
function defaultModulMetaDataInstalation($postId, $moduleName){
	
	$defaultContent	= "Content";
	//$moduleName		= "wp_hotely";
	
	return array(
		"sql" => "
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'info_hotel_name_1', '".$defaultContent."', 'text', 	2, 'Názov hotelu 1', 				1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'info_hotel_addr_1', '".$defaultContent."', 'text', 	2, 'Url adresa hotelu 1', 			1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'info_hotel_tel_c_1','".$defaultContent."', 'text', 	2, 'Telefón do hotela 1', 			1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'info_hotel_email_1','".$defaultContent."', 'text', 	2, 'Email hotelu 1', 				1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", '_menu_7_image_1_1', '".$defaultContent."', 'image',   	2, 'Fotka k modulu UBYTOVANIE', 	1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", '_menu_7_text_1', 	'".$defaultContent."', 'content', 	2, 'Text k modulu UBYTOVANIE 1', 	1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", '_menu_7_image_2_1', '".$defaultContent."', 'image',   	2, 'Fotka loga k modulu UBYTOVANIE',1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", '_menu_7_file1', 	'".$defaultContent."', 'file',		2, 'Súbor 1 default', 				1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", '_menu_7_file2', 	'".$defaultContent."', 'file',		2, 'Súbor 2 default', 				1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'link_hotel_1', 		'".$defaultContent."', 'text', 	2, 'Url adresa hotela 1', 			1);
		"
	);
	
}