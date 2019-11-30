<?php

include "../dnt-library/framework/_Class/Autoload.php";
$autoload = new Autoload;
$path = "../";
$autoload->load($path);

$rest = new Rest;
$dntUpload = new DntUpload;

/**
 *
 * WORKING WITH FACE DETECT
 *
 *
 * */
$install = new Install;
$db = new Db;
for ($i = 1; $i <= 501; $i++) {

    $VENDOR_NAME = "Stress " . $i;
    $COPY_FROM = 39;
    $LAYOUT = "wp_tpl_2";
    $DELETE_DATA = 0;
    $tables = array(
        //VSETKY STLPCE
        "dnt_admin_menu",
        "dnt_api",
        "dnt_config",
        "dnt_gallery",
        "dnt_languages",
        //"dnt_logs",
        //"dnt_mailer_mails",
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
    );

    $install->addVendor($tables, $VENDOR_NAME, $COPY_FROM, $LAYOUT, $DELETE_DATA);
    print "Vendor created: " . $i . "\n";
}
