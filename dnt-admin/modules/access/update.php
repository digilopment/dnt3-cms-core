<?php

use DntLibrary\Base\Api;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;

if (isset($_POST['sent'])) {
    $session = new Sessions;

    $table = "dnt_users";
    $user = new Api;
    $rest = new Rest;
    $post_id = $rest->get("post_id");
    $return = $rest->post("return");
    $pass = $rest->post("pass");
    $query = "SELECT * FROM dnt_users LIMIT 1";
    foreach ($user->getColumns($query) as $key => $value) {
        if ($value != "id" && ($rest->post($value) != false) && $value != "pass") {
            $setData["" . $value . ""] = $rest->post($value);
        }
    }
    if ($adminUser->validProcessLogin("admin", $session->get("admin_id"), $pass)) {
        $db->update(
                $table, //table
                $setData, //set 
                array(//where
            'id_entity' => $post_id,
            '`vendor_id`' => Vendor::getId())
        );

        if ($rest->post("gallery_key_user_avatar")) {
            $db->update(
                "dnt_users", //table
                    array(//set
                'img' => $rest->post("gallery_key_user_avatar"),
                    ), array(//where
                'id_entity' => $post_id,
                '`vendor_id`' => Vendor::getId()));
        } else {
            $dntUpload = new DntUpload;
            $dntUpload->addDefaultImage(
                    "userfile", //input type file
                    $table, //update table
                    "img", //update table column
                    "`id_entity`", //where column
                    $post_id, //where value
                    "../dnt-view/data/uploads"     //path
            );
        }
        
        get_top();
        get_top_html();
        getConfirmMessage($return, "<br/>Údaje sa úspešne uložili ");
        get_bottom_html();
        get_bottom();
    } else {
        
        get_top();
        get_top_html();
        error_message("heslo", "<b>Prosím zadajte vaše heslo pre uloženie údajov</b>");
        get_bottom_html();
        get_bottom();
    }
} else {
    $dnt->redirect(WWW_PATH_ADMIN_2 . "?src=" . DEFAULT_MODUL_ADMIN);
}