<?php

include "../dnt-library/framework/_Class/Autoload.php";
$autoload = new Autoload;
$path = "../";
$autoload->load($path);
$zip = new ZipArchive;
$zipFile = "49_dnt3.zip";


$res = $zip->open($zipFile);
if ($res === TRUE) {
	
	$random_digit=rand(0000,9999);
	mkdir($random_digit, 0777, true);
	
	$zip->extractTo("../dnt-install/_temp/".$random_digit.'/');
	$zip->close();

	$src = "../dnt-install/_temp/".$random_digit.'/dnt-view/data/';
	$dst = '../dnt-view/data/';
	Dnt::recurse_copy($src, $dst);
	Install::addInstallation('../dnt-install/_temp/'.$random_digit.'/dnt-install/install.sql');
	Dnt::rrmdir("../dnt-install/_temp/".$random_digit."");
	
	echo 'extraction AND install successful';
	} else {
	echo 'extraction error';
	}