<?php
$image = new Image();
if (isset($_POST['sent'])) {

    foreach ($_POST as $id => $value) {
        $id = str_replace("del_", "", $id);
        if (filter_var($id, FILTER_VALIDATE_INT)) {
            $ids[] = $id;
        }
    }
    $ids = implode(",", $ids);
    $db->query("DELETE FROM dnt_uploads WHERE id_entity IN ($ids) AND vendor_id = '" . Vendor::getId() . "'");
} else {
    $post_id = $rest->get("post_id");
    if ($post_id) {
        $post_id = $rest->get("post_id");
        $where = array('id_entity' => $post_id, 'vendor_id' => Vendor::getId());
        $db->delete('dnt_uploads', $where);
    }
}

$dnt->redirect(WWW_PATH_ADMIN . "index.php?src=" . $rest->get("src") . "");
