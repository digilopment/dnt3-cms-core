<?php
$post_id = $rest->get('post_id');
$query = "SELECT `show` FROM dnt_uploads WHERE id = '" . $post_id . "'";
if ($db->num_rows($query) > 0) {
    foreach ($db->get_results($query) as $row) {
        $show = $row['show'];
    }
}

if ($show == 0) {
    $set_show = 1;
} elseif ($show == 1) {
    $set_show = 2;
} else {
    $set_show = 0;
}
$table = 'dnt_uploads';
$db->update(
    $table, //table
    array( //set
        'show' => $set_show,
        ),
    array( //where
        'id' => $post_id,
        )
);
$dnt->redirect(WWW_PATH_ADMIN_2 . 'index.php?src=' . $rest->get('src') . '&filter=' . $rest->get('filter') . '');
