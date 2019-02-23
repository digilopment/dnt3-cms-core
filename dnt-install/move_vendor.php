<?php
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$install = new Install;

$vendor_id 			= "53"; //ORIGINAL
$vendor_movde_to 	= "48";  //NEW VENDOR ID
$tables = array(
	//VSETKY STLPCE
	"dnt_admin_menu",
	"dnt_api",
	"dnt_config",
	"dnt_gallery",
	"dnt_languages",
	"dnt_logs",
	"dnt_mailer_mails",
	"dnt_mailer_type",
	"dnt_microsites",
	"dnt_microsites_composer",
	"dnt_polls",
	"dnt_polls_composer",
	"dnt_posts",
	"dnt_posts_meta",
	"dnt_post_type",
	"dnt_registred_users",
	"dnt_settings",
	"dnt_translates",
	"dnt_uploads",
	"dnt_users",
	"dnt_vouchers",
);


$install->moveVendor($vendor_id, $vendor_movde_to, $tables);




