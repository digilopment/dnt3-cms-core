<?php

$db = new Db;
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
    if($url != $currentVendorUrl && ($vendor_id == Vendor::getId())){
        include "tpl_functions.php";
        get_top();
        include "top.php";
        $redirectUrl = HTTP_PROTOCOL.$url.'.'.DOMAIN.WWW_FOLDERS.'/dnt-admin';
        $urlString = '<a href="'.$redirectUrl.'">Prosím znovu sa prihláste</a>';
        getConfirmMessage($redirectUrl, "<br/><br/>Údaje sa úspešne uložili, ale zmenili ste aj adresu webu.<br><u> $urlString </u>");
        include "bottom.php";
        get_bottom();
        
        $session = new Sessions;
        $dnt = new Dnt;
        $session->remove("admin_logged");
        $session->remove("admin_id");
    }else{

        include "tpl_functions.php";
        get_top();
        include "top.php";
        getConfirmMessage($return, "<br/>Údaje sa úspešne uložili ");
        include "bottom.php";
        get_bottom();
    }
}