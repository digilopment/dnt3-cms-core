<?php

use DntLibrary\Base\Vendor;

if (isset($_POST['sent'])) {
    //var_dump($_POST);

    foreach ($_POST as $id => $value) {
        $id = str_replace('del_', '', $id);
        if (filter_var($id, FILTER_VALIDATE_INT)) {
            $ids[] = $id;
        }
    }
    $ids = implode(',', $ids);
    //var_dump($ids);
    $db->query("DELETE FROM dnt_uploads WHERE id_entity IN ($ids) AND vendor_id = '" . Vendor::getId() . "'");
} else {
    $post_id = $rest->get('post_id');
    if ($post_id) {
        $post_id = $rest->get('post_id');
        $where = array('id_entity' => $post_id, 'vendor_id' => Vendor::getId());
        $db->delete('dnt_uploads', $where);
    } else {
        echo 25;
    }
}

$dnt->redirect(WWW_PATH_ADMIN_2 . 'index.php?src=' . $rest->get('src') . '');
