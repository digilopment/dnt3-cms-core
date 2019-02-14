<?php
//include "autoload.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);

$rest 			= new Rest;
$config 		= new Config;
$dntLog 		= new DntLog;
$XMLgenerator	= new XMLgenerator;
$dnt 			= new Dnt;
$dntCache 		= new Cache;

if(isset($_GET['vendor_id'])){
	
	$vendor_id = $_GET['vendor_id'];
	//exportuj databázu
	@file_get_contents(WWW_PATH."dnt-jobs/dbExport.php?install_vendor=$vendor_id");


	// Get real path for our folder
	$rootPath = realpath('../');

	// Initialize archive object
	$zip = new ZipArchive();
	$zip->open('../dnt-backup/'.$vendor_id.'_dnt3.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

	// Create recursive directory iterator
	/** @var SplFileInfo[] $files */
	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($rootPath),
		RecursiveIteratorIterator::LEAVES_ONLY
	);

	foreach ($files as $name => $file)
	{
		// Skip directories (they would be added automatically)
		if (!$file->isDir())
		{
			// Get real and relative path for current file
			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($rootPath) + 1);
			
			if(
				Dnt::in_string("dnt-backup", $relativePath) || 
				Dnt::in_string("dnt-cache", $relativePath) || 
				Dnt::in_string("nbproject", $relativePath) || 
				Dnt::in_string("external-uploads", $relativePath) || 
				Dnt::in_string("generated-files", $relativePath) || 
				Dnt::in_string(".git", $relativePath)
			)
			{
				
			}else{
				// Add current file to archive
				$zip->addFile($filePath, $relativePath);
			}
			//var_dump($filePath, $relativePath);
		}
	}

	// Zip archive will be created only after closing object
	$zip->close();
	
	$url = WWW_PATH."dnt-backup/".$vendor_id."_dnt3.zip";
	echo '<a target="_blank" href="'.$url.'">Download => '.$url.'</a>';
}
			