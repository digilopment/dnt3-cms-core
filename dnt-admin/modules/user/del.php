<?php

use DntLibrary\Base\Vendor;

$post_id = $rest->get("post_id");
$where = array('id_entity' => $post_id, 'vendor_id' => Vendor::getId());
$db->delete('dnt_registred_users', $where);

$dnt->redirect("index.php?src=user");


