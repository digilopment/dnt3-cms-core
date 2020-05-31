<?php

use DntLibrary\Base\Dnt;
use DntLibrary\Base\Vendor;

$post_id = $rest->get("id");
$query = "SELECT `show` FROM dnt_admin_menu WHERE id_entity = '" . $post_id . "' AND vendor_id = '" . Vendor::getId() . "'";
if ($db->num_rows($query) > 0) {
    foreach ($db->get_results($query) as $row) {
        $show = $row['show'];
    }
}

if ($show == 0) {
    $set_show = 1;
} elseif ($show == 1) {
    $set_show = 0;
}
$table = "dnt_admin_menu";
$db->update(
        $table, //table
        array(//set
            'show' => $set_show,
        ),
        array(//where
            'id_entity' => $post_id,
            'vendor_id' => Vendor::getId(),
        )
);
Dnt::redirect(WWW_PATH_ADMIN_2 . "index.php?src=" . $rest->get("src") . "");



