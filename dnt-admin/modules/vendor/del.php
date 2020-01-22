<?php

$install    = new Install();
$rest    = new Rest();
$image    = new Image();
$vendor_id  = $rest->get("vendor_id");
if ($vendor_id) {
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

    $install->delVendor($vendor_id, $tables);
    $image->cleanIndependentFiles();
}
Dnt::redirect(WWW_PATH_ADMIN_2 . "index.php?src=" . $rest->get("src") . "");