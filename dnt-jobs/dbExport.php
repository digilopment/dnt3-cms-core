<?php 
include "../globals.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$rest = new Rest;
error_reporting(0);

    //ENTER THE RELEVANT INFO BELOW
    $mysqlUserName      = DB_USER;
    $mysqlPassword      = DB_PASS;
    $mysqlHostName      = DB_HOST;
    $DbName             = DB_NAME;
    $backup_name        = false;
    $tables             = false;
	
	if(isset($_GET['vendor_id']) && $_GET['vendor_id'] == 0){
		$vendor_id 		= 0;
		$backup_name   	= "../dnt-install/install.sql";
		//echo "Database was exported. - ".$backup_name;
	}
	elseif(isset($_GET['vendor_id'])){
		$vendor_id 		= $rest->get("vendor_id");
		$backup_name   = "../dnt-backup/".$rest->get("vendor_id")."-".Dnt::name_url(Dnt::datetime())."-".$DbName.".sql";
		//echo "Database was exported. - ".$backup_name;
	}else{
		$vendor_id = false;
		$backup_name   = "../dnt-backup/".$DbName.".sql";
		//echo "Database was exported. - ".$backup_name;
	}
	
	Install::Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,  $tables=false, $backup_name, $vendor_id);
?>