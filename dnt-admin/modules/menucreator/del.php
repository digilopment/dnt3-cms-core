<?php

$post_id = $rest->get("id");
if ($post_id) {
    $where = array('id_entity' => $post_id, 'vendor_id' => Vendor::getId());
    $db->delete('dnt_admin_menu', $where);
}

Dnt::redirect(WWW_PATH_ADMIN_2 . "index.php?src=" . $rest->get("src") . "");



