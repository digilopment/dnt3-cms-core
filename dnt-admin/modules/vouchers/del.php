<?php


$post_id = $rest->get('post_id');
if ($post_id) {
    $where = array('id_entity' => $post_id, 'vendor_id' => $vendor->getId());
    $db->delete('dnt_vouchers', $where);
} else {
}
$dnt->redirect(WWW_PATH_ADMIN_2 . 'index.php?src=' . $rest->get('src') . '');
