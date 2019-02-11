<?php
$dnt = new Dnt;
if(isset($_POST['sent'])){
	$dntUpload 	= new DntUpload;
	$zip = new ZipArchive;
	$path 		= "../dnt-view/data/uploads";
	$files 		= $_FILES['userfile']; 
	
	$uploadedFile = $dntUpload->multypleUpload($files, $path, false);
	$uploadedFile = $uploadedFile['name'];
	
	$zipFile = "../dnt-view/data/uploads/".$uploadedFile;
	$res = $zip->open($zipFile);
	if ($res === TRUE) {
	
		$random_digit=rand(0000,9999);
		
		$zip->extractTo("../dnt-install/_temp/".$random_digit.'/');
		$zip->close();
		$sqlFile 	= '../dnt-install/_temp/'.$random_digit.'/dnt-install/install.sql';
		if(file_exists($sqlFile)){
			$src 		= "../dnt-install/_temp/".$random_digit.'/dnt-view/data/';
			$dst 		= '../dnt-view/data/';
			Dnt::recurse_copy($src, $dst);
			Install::addInstallation($sqlFile);
			Dnt::rrmdir("../dnt-install/_temp/");
			$dnt->redirect(WWW_PATH_ADMIN."index.php?src=vendor");
		}else{
			$redirectUrl = "index.php?src=vendor&action=import";
			$urlString = '<a href="'.$redirectUrl.'">Prosím použite iný súbor</a>';
			$customMessage = "<b>.zip</b>, ktorý sa pokúšate importovať ako nový web, nie je platná verzia platformy <b>dnt3</b>.<br><br>$urlString";
		}
		Dnt::deleteFile($zipFile);
	} else {
		$redirectUrl = "index.php?src=vendor&action=import";
		$urlString = '<a href="'.$redirectUrl.'">Prosím použite platný <b>.zip</b> súbor</a>';
		$customMessage = "<b>.súbor</b>, ktorý sa pokúšate importovať ako nový web, nie je súbor vo formáte <b>.zip</b>.<br><br> $urlString";
	}
	include "tpl_functions.php";
			get_top();
			include "top.php";
			error_message("názov", $customMessage);
			include "bottom.php";
			get_bottom();
}else{
	$dnt->redirect(WWW_PATH_ADMIN."index.php?src=vendor");
}
