<?php
$post_id = $rest->get("post_id");
$where = array( 'id_entity' => $post_id, 'vendor_id' => Vendor::getId());
$db->delete( 'dnt_posts', $where);

$dnt->redirect(WWW_PATH_ADMIN."index.php?src=".$rest->get("src")."&included=".$rest->get("included")."&filter=".$rest->get("filter")."");


