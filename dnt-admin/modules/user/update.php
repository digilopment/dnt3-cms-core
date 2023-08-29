<?php

use DntLibrary\Base\Api;
use DntLibrary\Base\DB;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;

if (isset($_POST['sent'])) {
    $db = new DB();


    $session = new Sessions();

    $table = 'dnt_registred_users';
    $user = new Api();
    $rest = new Rest();
    $post_id = $rest->get('post_id');
    $return = $rest->post('return');
    $pass = $rest->post('pass');
    //var_dump($user->getColumns($query));
    $query = 'SELECT * FROM dnt_registred_users';
    foreach ($user->getColumns($query) as $key => $value) {
        if ($value != 'id' &&
                $value != 'id_entity' &&
                $value != 'pass' &&
                $value != 'vendor_id' &&
                $value != 'ip_adresa' &&
                $value != 'parent_id' &&
                $value != 'datetime_creat' &&
                $value != 'datetime_update' &&
                $value != 'login' &&
                $value != 'img'
        ) {
            $setData['' . $value . ''] = $rest->post($value);
            $setData['status'] = 1;
        }
    }


    //var_dump($setData);
    //exit;
    //if($adminUser->validProcessLogin("admin", $session->get("admin_id"), $pass)){
    $db->update(
        $table, //table
        $setData, //set
        array(//where
                'id_entity' => $post_id,
                '`vendor_id`' => $vendor->getId(),
            )
    );

    if ($rest->post('gallery_key_user_avatar_' . $post_id)) {
        if ($rest->post('gallery_key_user_avatar_' . $post_id) == 'del') {
            $galleryData = '';
        } else {
            $galleryData = $rest->post('gallery_key_user_avatar_' . $post_id);
        }

        $db->update(
            'dnt_registred_users', //table
            array(//set
                    'img' => $galleryData,
                ),
            array(//where
                    'id_entity' => $post_id,
                    '`vendor_id`' => $vendor->getId())
        );
    } else {
        $dntUpload = new DntUpload();
        $dntUpload->addDefaultImage(
            'userfile', //input type file
            $table, //update table
            'img', //update table column
            '`id`', //where column
            $post_id, //where value
            '../dnt-view/data/uploads' //path
        );
    }


    get_top();
    get_top_html();
    getConfirmMessage($return, '<br/>Údaje sa úspešne uložili ');
    get_bottom_html();
    get_bottom();
}


//echo "Ok";
