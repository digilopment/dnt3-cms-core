<?php

use DntLibrary\Base\Api;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

if (isset($_POST['sent'])) {
    $query = $query = "SELECT * FROM dnt_users";
    $table = "dnt_users";
    $user = new Api;
    $rest = new Rest;

    $pass = $rest->post("pass");
    $re_pass = $rest->post("re_pass");

    if ($pass == $re_pass && ($pass != "")) {

        foreach ($user->getColumns($query) as $key => $value) {
            if ($value != "id" && "id_entity" && "vendor_id" && "pass") {
                $insertedData["`" . $value . "`"] = $rest->post($value);
                if ($rest->post("type") == "") {
                    $insertedData["`type`"] = "admin";
                }
                if ($rest->post("login") == "") {
                    $insertedData["`login`"] = $vendor->getColumn("name_url");
                }
            }
        }
        $insertedData['`vendor_id`'] = $vendor->getId();
        $db->insert($table, $insertedData);
        $post_id = $dnt->getLastId($table, $vendor->getId());

        $db->update(
                $table, //table
                array(//set
                    'status' => 1,
                    'pass' => md5($pass),
                    'datetime_creat' => $dnt->datetime(),
                    'datetime_update' => $dnt->datetime(),
                    'datetime_publish' => $dnt->datetime(),
                ), array(//where
            'id' => $post_id,
                )
        );
        $return = "index.php?src=access&action=edit&post_id=$post_id";

        $dntUpload = new DntUpload;
        $dntUpload->addDefaultImage(
                "userfile", //input type file
                $table, //update table
                "img", //update table column
                "`id_entity`", //where column
                $post_id, //where value
                "../dnt-view/data/uploads"  //path
        );
        include "plugins/webhook/tpl_functions.php";
        get_top();
        get_top_html();
        getConfirmMessage($return, "<br/>Údaje sa úspešne uložili ");
        get_bottom_html();
        get_bottom();
    } else {
        include "plugins/webhook/tpl_functions.php";
        get_top();
        get_top_html();
        error_message("heslo", "<b>Vaše heslá sa musia zhodovať</b>");
        get_bottom_html();
        get_bottom();
    }
} else {
    $dnt->redirect(WWW_PATH_ADMIN_2 . "?src=" . DEFAULT_MODUL_ADMIN);
}