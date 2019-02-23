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
	
	$mysqlUserName      = DB_USER;
    $mysqlPassword      = DB_PASS;
    $mysqlHostName      = DB_HOST;
    $DbName             = DB_NAME;
    $tables             = false;
	$backup_name   	= "../dnt-install/install.sql";
	Install::Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,  $tables=false, $backup_name, $vendor_id);
	
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

	$db = new Db;
	foreach ($files as $name => $file)
	{
		// Skip directories (they would be added automatically)
		if (!$file->isDir())
		{
			// Get real and relative path for current file
			$filePath = $file->getRealPath();
			$relativePath = substr($filePath, strlen($rootPath) + 1);
			
			if(
				Dnt::in_string("dnt-view", $relativePath) || 
				Dnt::in_string("dnt-install", $relativePath)
			)
			{
				$query = "SELECT name FROM dnt_uploads WHERE vendor_id = $vendor_id";
				if ($db->num_rows($query) > 0) {
					foreach ($db->get_results($query) as $row) {
						if(Dnt::in_string($row['name'], $relativePath)){
							$zip->addFile($filePath, $relativePath);
						}
					}
				}
				if(Dnt::in_string("dnt-install", $relativePath)){
					$zip->addFile($filePath, $relativePath);
				}
			}
		}
	}

	// Zip archive will be created only after closing object
	$zip->close();
	
	$url = WWW_PATH."dnt-backup/".$vendor_id."_dnt3.zip";
	echo '<a target="_blank" href="'.$url.'">Download => '.$url.'</a>';
}
			