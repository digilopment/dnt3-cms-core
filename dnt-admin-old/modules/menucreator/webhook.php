<?php
function configMenuItems(){
	
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-gears", 
		'`order`' 			=> "20", 
		'`name`' 			=> "Nastavenia", 
		'`name_url`' 		=> 'settings',
		'`name_url_sub`' 	=> 'settings',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "post", 
		'`ico`' 			=> "fa-laptop", 
		'`order`' 			=> "30", 
		'`name`' 			=> "Obsah", 
		'`name_url`' 		=> 'content',
		'`name_url_sub`' 	=> 'content&incuded=post',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-plus", 
		'`order`' 			=> "1", 
		'`name`' 			=> "Pridať post", 
		'`name_url`' 		=> 'content',
		'`name_url_sub`' 	=> 'content&add',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "6", 
		'`name`' 			=> "Bleskovky", 
		'`name_url`' 		=> 'content&filter=bleskovky',
		'`name_url_sub`' 	=> 'content',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-user", 
		'`order`' 			=> "80", 
		'`name`' 			=> "Prístupy", 
		'`name_url`' 		=> 'access',
		'`name_url_sub`' 	=> 'access',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "3", 
		'`name`' 			=> "Stránky", 
		'`name_url`' 		=> 'content',
		'`name_url_sub`' 	=> 'content&filter=pages',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa fa-home", 
		'`order`' 			=> "10", 
		'`name`' 			=> "Domov", 
		'`name_url`' 		=> 'home',
		'`name_url_sub`' 	=> '',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "70", 
		'`name`' 			=> "Faktúry", 
		'`name_url`' 		=> 'faktura',
		'`name_url_sub`' 	=> '',
		'`show`' 			=> '0',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-envelope", 
		'`order`' 			=> "90", 
		'`name`' 			=> "Mailer", 
		'`name_url`' 		=> 'mailer',
		'`name_url_sub`' 	=> 'mailer',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "5", 
		'`name`' 			=> "Všetky prístupy", 
		'`name_url`' 		=> 'pristupy',
		'`name_url_sub`' 	=> 'pristupy',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-plus", 
		'`order`' 			=> "0", 
		'`name`' 			=> "Pridať prístup", 
		'`name_url`' 		=> 'pristupy',
		'`name_url_sub`' 	=> 'pristupy&pridat',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "4", 
		'`name`' 			=> "Podstránky", 
		'`name_url`' 		=> 'content',
		'`name_url_sub`' 	=> 'content&filter=pages-sub',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-plus", 
		'`order`' 			=> "2", 
		'`name`' 			=> "Pridať podstránku", 
		'`name_url`' 		=> 'content',
		'`name_url_sub`' 	=> 'content&add=pages-sub',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "7", 
		'`name`' 			=> "Statický obsah", 
		'`name_url`' 		=> 'content',
		'`name_url_sub`' 	=> 'content&filter=static',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "7", 
		'`name`' 			=> "Sponzori", 
		'`name_url`' 		=> 'content',
		'`name_url_sub`' 	=> 'content&filter=sponzori',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "8", 
		'`name`' 			=> "Partneri", 
		'`name_url`' 		=> 'content',
		'`name_url_sub`' 	=> 'content&filter=partneri',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-language", 
		'`order`' 			=> "60", 
		'`name`' 			=> "Multylanguage", 
		'`name_url`' 		=> 'multylanguage',
		'`name_url_sub`' 	=> '',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "23", 
		'`name`' 			=> "Aktívne jazyky", 
		'`name_url`' 		=> 'multylanguage',
		'`name_url_sub`' 	=> 'multylanguage&add',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "22", 
		'`name`' 			=> "Zoznamp rekladov", 
		'`name_url`' 		=> 'multylanguage',
		'`name_url_sub`' 	=> 'multylanguage&action=translates',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "sitemap", 
		'`ico`' 			=> "fa fa-list", 
		'`order`' 			=> "40", 
		'`name`' 			=> "Sitemap", 
		'`name_url`' 		=> 'content',
		'`name_url_sub`' 	=> 'content&incuded=sitemap',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-pie-chart", 
		'`order`' 			=> "70", 
		'`name`' 			=> "Kvízy", 
		'`name_url`' 		=> 'polls',
		'`name_url_sub`' 	=> 'polls',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "23", 
		'`name`' 			=> "Pridať kvíz", 
		'`name_url`' 		=> 'polls',
		'`name_url_sub`' 	=> 'polls&action=add_poll',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "23", 
		'`name`' 			=> "Zoznam kvízov", 
		'`name_url`' 		=> 'polls',
		'`name_url_sub`' 	=> 'polls',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-file", 
		'`order`' 			=> "50", 
		'`name`' 			=> "Súbory", 
		'`name_url`' 		=> 'files',
		'`name_url_sub`' 	=> 'files',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-gears", 
		'`order`' 			=> "100", 
		'`name`' 			=> "Microweb", 
		'`name_url`' 		=> 'microweb',
		'`name_url_sub`' 	=> 'microweb',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-gears", 
		'`order`' 			=> "20", 
		'`name`' 			=> "Zoznam", 
		'`name_url`' 		=> 'microweb',
		'`name_url_sub`' 	=> 'microweb',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-gears", 
		'`order`' 			=> "20", 
		'`name`' 			=> "Pridať", 
		'`name_url`' 		=> 'microweb',
		'`name_url_sub`' 	=> 'microweb&action=add',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-globe", 
		'`order`' 			=> "110", 
		'`name`' 			=> "Zoznamwebov", 
		'`name_url`' 		=> 'vendor',
		'`name_url_sub`' 	=> '',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "22", 
		'`name`' 			=> "Zoznam", 
		'`name_url`' 		=> 'vendor',
		'`name_url_sub`' 	=> 'vendor',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "22", 
		'`name`' 			=> "Pridať web", 
		'`name_url`' 		=> 'vendor',
		'`name_url_sub`' 	=> 'vendor&action=add',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-user", 
		'`order`' 			=> "100", 
		'`name`' 			=> "Zoznam", 
		'`name_url`' 		=> 'user',
		'`name_url_sub`' 	=> 'user',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-user", 
		'`order`' 			=> "100", 
		'`name`' 			=> "Pridať používateľa", 
		'`name_url`' 		=> 'user',
		'`name_url_sub`' 	=> 'user&action=add',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-user", 
		'`order`' 			=> "100", 
		'`name`' 			=> "Používatelia", 
		'`name_url`' 		=> 'user',
		'`name_url_sub`' 	=> 'user',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa fa-line-chart", 
		'`order`' 			=> "15", 
		'`name`' 			=> "Štatistika", 
		'`name_url`' 		=> 'statistics',
		'`name_url_sub`' 	=> '',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa fa-image", 
		'`order`' 			=> "15", 
		'`name`' 			=> "Galérie", 
		'`name_url`' 		=> 'gallery',
		'`name_url_sub`' 	=> '',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "fa-file-excel-o", 
		'`order`' 			=> "90", 
		'`name`' 			=> "Voučre", 
		'`name_url`' 		=> 'vouchers',
		'`name_url_sub`' 	=> 'vouchers',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "submenu", 
		'`included`' 		=> "", 
		'`ico`' 			=> "", 
		'`order`' 			=> "22", 
		'`name`' 			=> "Importovať web", 
		'`name_url`' 		=> 'vendor',
		'`name_url_sub`' 	=> 'vendor&action=import',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "video", 
		'`ico`' 			=> "fa fa-video-camera", 
		'`order`' 			=> "40", 
		'`name`' 			=> "Video", 
		'`name_url`' 		=> 'content',
		'`name_url_sub`' 	=> 'content&incuded=video',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);
	$insertedData[] = array(
		'`vendor_id`' 	=> Vendor::getId(), 
		'`type`' 			=> "menu", 
		'`included`' 		=> "gallery", 
		'`ico`' 			=> "fa fa-list", 
		'`order`' 			=> "40", 
		'`name`' 			=> "Galérie", 
		'`name_url`' 		=> 'content',
		'`name_url_sub`' 	=> 'content&incuded=gallery',
		'`show`' 			=> '1',
		'`parent_id`' 		=> '0',
	);

	return $insertedData;
}

function menuQuery(){
	$query = "SELECT * FROM `dnt_admin_menu` WHERE `vendor_id` = ".Vendor::getId()." ORDER BY `type`, `order`";
	return $query;
}
function addToMenu(){
	$db = new Db();
	$query = menuQuery();
	foreach($db->get_results($query) as $row){
		//var_dump($row);	
	}

	$menuData = configMenuItems();
	foreach($menuData as $data){
		//var_dump($data);
	}

	foreach ($menuData as $key => $value) {
		$configKeys[] = $value['`name_url_sub`'];
	}

	foreach ($db->get_results($query) as $row) {
		$existingKey[] = $row['name_url_sub'];
	}

	$diffedArray = array_diff($configKeys, $existingKey);

	//get configKeys of diffed ararys
	$arrOfConfigKeys = array();
	foreach ($configKeys as $key => $value) {
		if (in_array($value, $diffedArray)) {
			$arrOfConfigKeys[] = $key;
			continue;
		}
	}
				
	$db = new Db;
	foreach ($arrOfConfigKeys as $key) {
		var_dump($menuData[$key]);
		$db->insert('dnt_admin_menu', $menuData[$key]);
	}
}
	
function sql2Arr(){	
	$data = '
	(null,"566","57","menu",""," fa-gears","20","Nastavenia","settings","settings","1","0"),
	(null,"567","57","menu","post","fa-laptop","30","Obsah","content","content&incuded=post","1","0"),
	(null,"568","57","submenu","","fa-plus","1","Pridať post","content","content&add","1","0"),
	(null,"569","57","submenu","","","6","Bleskovky","content&filter=bleskovky","content","1","0"),
	(null,"570","57","menu","","fa-user","80","Prístupy","access","access","1","0"),
	(null,"572","57","submenu","","","3","Stránky","content","content&filter=pages","1","0"),
	(null,"573","57","menu","","fa fa-home","10","Domov","home","","1","0"),
	(null,"574","57","menu","","","70","Faktúry","faktura","","0","0"),
	(null,"575","57","menu","","fa-envelope","90","Mailer","mailer","mailer","1","0"),
	(null,"576","57","submenu","","","5","Všetky prístupy","pristupy","pristupy","1","0"),
	(null,"577","57","submenu","","fa-plus","0","Pridať prístup","pristupy","pristupy&pridat","1","0"),
	(null,"578","57","submenu","","","4","Podstránky","content","content&filter=pages-sub","1","0"),
	(null,"579","57","submenu","","fa-plus","2","Pridať podstránku","content","content&add=pages-sub","1","0"),
	(null,"580","57","submenu","","","7","Statický obsah","content","content&filter=static","1","0"),
	(null,"582","57","submenu","","","7","Sponzori","content","content&filter=sponzori","1","0"),
	(null,"583","57","submenu","","","8","Partneri","content","content&filter=partneri","1","0"),
	(null,"584","57","menu","","fa-language","60","Multylanguage","multylanguage","","1","0"),
	(null,"585","57","submenu","","","23","Aktívne jazyky","multylanguage","multylanguage&add","1","0"),
	(null,"586","57","submenu","","","22","Zoznam prekladov","multylanguage","multylanguage&action=translates","1","0"),
	(null,"587","57","menu","sitemap","	fa fa-list","40","Sitemap","content","content&incuded=sitemap","1","0"),
	(null,"589","57","menu","","fa-pie-chart","70","Kvízy","polls","polls","1","0"),
	(null,"590","57","submenu","","","23","Pridať kvíz","polls","polls&action=add_poll","1","0"),
	(null,"591","57","submenu","","","23","Zoznam kvízov","polls","polls","1","0"),
	(null,"592","57","menu",""," fa-file","50","Súbory","files","files","1","0"),
	(null,"646","57","menu",""," fa-gears","100","Microweb","microweb","microweb","1","0"),
	(null,"647","57","submenu",""," fa-gears","20","Zoznam","microweb","microweb","1","0"),
	(null,"648","57","submenu",""," fa-gears","20","Pridať","microweb","microweb&action=add","1","0"),
	(null,"759","57","menu","","fa-globe","110","Zoznam webov","vendor","","1","0"),
	(null,"760","57","submenu","","","22","Zoznam","vendor","vendor","1","0"),
	(null,"761","57","submenu","","","22","Pridať web","vendor","vendor&action=add","1","0"),
	(null,"1623","57","submenu",""," fa-user","100","Zoznam","user","user","1","0"),
	(null,"1624","57","submenu",""," fa-user","100","Pridať používateľa","user","user&action=add","1","0"),
	(null,"1625","57","menu",""," fa-user","100","Používatelia","user","user","1","0"),
	(null,"1831","57","menu","","fa fa-line-chart","15","Štatistika","statistics","","1","0"),
	(null,"1833","57","menu","","fa fa-image","15","Galérie","gallery","","1","0"),
	(null,"1869","57","menu","","fa-file-excel-o","90","Voučre","vouchers","vouchers","1","0"),
	(null,"2161","57","submenu","","","22","Importovať web","vendor","vendor&action=import","1","0"),
	(null,"3031","57","menu","video","fa fa-list","40","Video","content","content&incuded=video","1","0"),
	(null,"3032","57","menu","gallery","fa fa-list","40","Galérie","content","content&incuded=gallery","1","0");
	';
	
	$data = str_replace(");", "),", $data);
	$data = explode("),", $data);
	$i = 0;
	foreach($data as $value){
		$items[]= $value;
		$i++;
	}

	$x = 0;
	foreach($items as $row){
		$tmp = str_replace("(", "", $row);
		$tmp = str_replace("'", "", $tmp);
		$tmp = str_replace('"', '', $tmp);
		$tmp = preg_replace('/\s+/', '', $tmp);
		$tmp = str_replace('fafa', 'fa fa', $tmp);
		$tmp = str_replace('Pridať', 'Pridať ', $tmp);
		$tmp = str_replace('Importovať', 'Importovať ', $tmp);
		$tmp = str_replace('Zoznam', 'Zoznam ', $tmp);
		$tmp = str_replace('Aktívne', 'Aktívne ', $tmp);
		$tmp = str_replace('Všetci', 'Všetci ', $tmp);
		$tmp = str_replace('Všetky', 'Všetky ', $tmp);
		$cleanRow = $tmp;
		
		foreach(explode(",", $cleanRow) as $item){
			$fill[] = $item;
		}
		//@var_dump($fill[9+$x]);
		echo '$insertedData[] = array(
					\'`vendor_id`\' 	=> Vendor::getId(), 
					\'`type`\' 			=> "'.@$fill[3+$x].'", 
					\'`included`\' 		=> "'.@$fill[4+$x].'", 
					\'`ico`\' 			=> "'.@$fill[5+$x].'", 
					\'`order`\' 			=> "'.@$fill[6+$x].'", 
					\'`name`\' 			=> "'.@$fill[7+$x].'", 
					\'`name_url`\' 		=> \''.@$fill[8+$x].'\',
					\'`name_url_sub`\' 	=> \''.@$fill[9+$x].'\',
					\'`show`\' 			=> \''.@$fill[10+$x].'\',
					\'`parent_id`\' 		=> \''.@$fill[11+$x].'\',
				);
				';
	 $x = $x+12;
	}
}

if($rest->get("action") == "sql2Arr")
{
	sql2Arr();
}elseif($rest->get("action") == "addToMenu"){
	addToMenu();
	Dnt::redirect(WWW_PATH_ADMIN."index.php?src=".$rest->get("src")."");
}elseif($rest->get("action") == "show_hide"){
	include "show_hide.php";
}elseif($rest->get("action") == "update"){
	include "update.php";
}else{
	include "tpl.php";
}
