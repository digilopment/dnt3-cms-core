<?php
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$install = new Install;

$VENDOR_NAME 	= "Botor";
$COPY_FROM 		= "8";
$tables = array(
	//VSETKY STLPCE
	"dnt_admin_menu",
	"dnt_api",
	"dnt_config",
	"dnt_languages",
	"dnt_logs",
	"dnt_mailer_mails",
	"dnt_mailer_type",
	"dnt_polls",
	"dnt_polls_composer",
	"dnt_posts",
	"dnt_posts_meta",
	"dnt_post_type",
	"dnt_settings",
	"dnt_translates",
	"dnt_uploads",
	"dnt_users",
);

$install->addVendor($tables, $VENDOR_NAME, $COPY_FROM);

