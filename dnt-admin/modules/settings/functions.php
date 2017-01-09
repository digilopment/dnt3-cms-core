<?php
if(isset($_POST['odoslat_1'])){
	//$server = $_POST['server'];
	$keywords = $_POST['keywords'];
	$nadpis_stranky = $_POST['nadpis_stranky'];
	$startovaci_modul = $_POST['startovaci_modul'];
	$target = $_POST['target'];
	$default_lang = $_POST['default_lang'];
	$return = $_POST['return'];
	$default_stat_user = $_POST['default_stat_user'];
	$cachovanie = $_POST['cachovanie'];
	
	//mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$server."' WHERE typ='server' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$default_lang."' WHERE typ='default_lang' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$keywords."' WHERE typ='keywords' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$nadpis_stranky."' WHERE typ='title' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$startovaci_modul."' WHERE typ='startovaci_modul' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$target."' WHERE typ='target' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$default_stat_user."' WHERE typ='default_stat_user' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$cachovanie."' WHERE typ='cachovanie' AND vendor = '".getVendorId($dntDb)."'");
	confrim_message($return, "Údaje sa úspešne uložili");
}
elseif(isset($_POST['odoslat_2'])){
	$notifikacny_email = $_POST['notifikacny_email'];
	$facebook_page = $_POST['facebook_page'];
	$twitter = $_POST['twitter'];
	$youtube = $_POST['youtube'];
	$flickr = $_POST['flickr'];
	$google_map = $_POST['google_map'];
	$return = $_POST['return'];
	
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$notifikacny_email."' WHERE typ='notifikacny_email' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$facebook_page."' WHERE typ='facebook_page' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$twitter."' WHERE typ='twitter' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$youtube."' WHERE typ='youtube' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$flickr."' WHERE typ='flickr' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$google_map."' WHERE typ='google_map' AND vendor = '".getVendorId($dntDb)."'");
	
	confrim_message($return, "Údaje sa úspešne uložili");
}
elseif(isset($_POST['odoslat_3'])){
	$vendor_company = $_POST['vendor_company'];
	$vendor_street = $_POST['vendor_street'];
	$vendor_psc = $_POST['vendor_psc'];
	$vendor_city = $_POST['vendor_city'];
	$vendor_tel = $_POST['vendor_tel'];
	$vendor_fax = $_POST['vendor_fax'];
	$vendor_email = $_POST['vendor_email'];
	$vendor_ico = $_POST['vendor_ico'];
	$vendor_dic = $_POST['vendor_dic'];
	$vendor_iban = $_POST['vendor_iban'];
	$return = $_POST['return'];
	
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$vendor_company."' WHERE typ='vendor_company' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$vendor_street."' WHERE typ='vendor_street' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$vendor_psc."' WHERE typ='vendor_psc' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$vendor_city."' WHERE typ='vendor_city' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$vendor_tel."' WHERE typ='vendor_tel' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$vendor_fax."' WHERE typ='vendor_fax' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$vendor_email."' WHERE typ='vendor_email' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$vendor_ico."' WHERE typ='vendor_ico' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$vendor_dic."' WHERE typ='vendor_dic' AND vendor = '".getVendorId($dntDb)."'");
	mysql_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$vendor_iban."' WHERE typ='vendor_iban' AND vendor = '".getVendorId($dntDb)."'");
	confrim_message($return, "Údaje sa úspešne uložili");
}
elseif(isset($_POST['odoslat_4'])){
	$platca_dph = $_POST['platca_dph'];
	$znak_meny = $_POST['znak_meny'];
	$nazov_meny = $_POST['nazov_meny'];
	$dph = $_POST['dph'];
	$return = $_POST['return'];

	
	dnt_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$platca_dph."' WHERE typ='platca_dph' AND vendor = '".getVendorId($dntDb)."'", $dntDb);
	dnt_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$znak_meny."' WHERE typ='vendor_currency' AND vendor = '".getVendorId($dntDb)."'", $dntDb);
	dnt_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$nazov_meny."' WHERE typ='vendor_currency_nazov' AND vendor = '".getVendorId($dntDb)."'", $dntDb);
	dnt_query("UPDATE `dnt_nastavenia` SET `nastavenie`='".$dph."' WHERE typ='vendor_dph' AND vendor = '".getVendorId($dntDb)."'", $dntDb);
	
	confrim_message($return, "Údaje sa úspešne uložili");
}

elseif(isset($_POST['odoslat_logo'])){
	$return = $_POST['return'];
	if (is_file($_FILES['userfile']['tmp_name'])) {	
		//vymazat("data/users/".$url_fotka);
		$uploaddir = "../".getMySystem()."data/".getVendorId($dntDb)."/uploads/";
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);	
		include "includes/singl-image-upload.php";
		$no_update = false;
		$fotka = $url_fotka.".".$fotka_pripona;
	}
	else{
		$fotka = false;
		$no_update = "no_update";
		}
	
	//dnt_query("UPDATE `dnt_nastavenia".$no_update."` SET fotka_pripona='".$fotka_pripona."' WHERE id='".$id."' AND vendor = '".getVendorId($dntDb)."'", $dntDb);
	
	dnt_query("UPDATE `dnt_nastavenia".$no_update."` SET `nastavenie`='".$fotka."' WHERE 
	typ='logo_firmy' AND 
	vendor = '".getVendorId($dntDb)."'", $dntDb);
	
	confrim_message($return, "Údaje sa úspešne uložili");
}

elseif(isset($_POST['odoslat_noimage'])){
	$return = $_POST['return'];
	if (is_file($_FILES['userfile']['tmp_name'])) {	
		//vymazat("data/users/".$url_fotka);
		$uploaddir = "../".getMySystem()."data/".getVendorId($dntDb)."/uploads/";
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);	
		include "includes/singl-image-upload.php";
		$no_update = false;
		$fotka = $url_fotka.".".$fotka_pripona;
	}
	else{
		$fotka = false;
		$no_update = "no_update";
		}
	
	//dnt_query("UPDATE `dnt_nastavenia".$no_update."` SET fotka_pripona='".$fotka_pripona."' WHERE id='".$id."' AND vendor = '".getVendorId($dntDb)."'", $dntDb);
	
	dnt_query("UPDATE `dnt_nastavenia".$no_update."` SET `nastavenie`='".$fotka."' WHERE 
	typ='no_img' AND 
	vendor = '".getVendorId($dntDb)."'", $dntDb);
	
	confrim_message($return, "Údaje sa úspešne uložili");
}

else{
	//$presmeruj_url = getMyServerRs($dntDb)."index.php?src=nastavenia";
	presmeruj_url(getMyServerRs($dntDb));
	}
//$presmeruj_url = getMyServerRs($dntDb)."nastavenia";
//presmeruj_url($presmeruj_url);
?>


