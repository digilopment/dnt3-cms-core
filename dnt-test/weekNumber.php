<?php
include "../globals.php";
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$vendor 		= new Vendor;

/** 
 *
 *EXPORT DATA TO CSV
 *
 *
**/
$date = Dnt::datetime();
$date = new DateTime($date);
$week = $date->format("W");
echo "Weeknummer: <b>$week</b>";
			