<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Install;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;

$db = new DB();
$install = new Install;
if (isset($_POST['sent'])) {

    $vendor_id = $rest->post("vendor_id");
    $name = $rest->post("name");
    $url = $rest->post("url");
    $layout = $rest->post("layout");
    $zobrazit_show_real_url = $rest->post("zobrazit_show_real_url");
    $zobrazit_in_progress = $rest->post("zobrazit_in_progress");
    $real_url = $rest->post("real_url");
    $real_url = preg_replace('/\s+/', '', $real_url);
    $return = $rest->post("return");
    $vendor_movde_to = $rest->post("vendor_id_move");

    $currentVendorUrl = Vendor::getColumn("name_url");

    $db->update(
            "dnt_vendors", //table
            array(//set
                'name' => $name,
                'name_url' => $url,
                'layout' => $layout,
                'show_real_url' => $zobrazit_show_real_url,
                'in_progress' => $zobrazit_in_progress,
                'real_url' => $real_url,
            ),
            array(//where
                '`id`' => $vendor_id)
    );

    //kontrola ci sa nezmenila URL
    if ($vendor_movde_to != $vendor_id) {

        $vendorId = array();
        foreach (Vendor::getAll() as $vendor) {
            $vendorId[] = $vendor['id'];
        }

        if (in_array($vendor_movde_to, $vendorId)) {
            $customMessage = "Vendor ID <b>$vendor_movde_to</b>, sa už používa, prosím použite iné <b>Vendor ID</b>";

            get_top();
            get_top_html();
            error_message("Vendor ID", $customMessage);
            get_bottom_html();
            get_bottom();
        } else {
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
        }
    }

    if ($url != $currentVendorUrl && ($vendor_id == Vendor::getId())) {

        get_top();
        get_top_html();
        $redirectUrl = HTTP_PROTOCOL . $url . '.' . DOMAIN . WWW_FOLDERS . '/' . ADMIN_URL_2;
        $urlString = '<a href="' . $redirectUrl . '">Prosím znovu sa prihláste</a>';
        getConfirmMessage($redirectUrl, "<br/><br/>Údaje sa úspešne uložili, ale zmenili ste aj adresu webu.<br><u> $urlString </u>");
        get_bottom_html();
        get_bottom();

        $session = new Sessions;
        $dnt = new Dnt;
        $session->remove("admin_logged");
        $session->remove("admin_id");
    } else {


        get_top();
        get_top_html();
        getConfirmMessage($return, "<br/>Údaje sa úspešne uložili ");
        get_bottom_html();
        get_bottom();
    }
}