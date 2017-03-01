<?php
$post_id = $rest->get("post_id");
$query = "SELECT `show` FROM dnt_posts WHERE id = '".$post_id."'";
if($db->num_rows($query)>0){
 foreach($db->get_results($query) as $row){
     $show = $row['show'];
 }
}

if($show == 1){
    $set_show = 0;
}else{
    $set_show = 1;
}
$table = "dnt_posts";
$db->update(
    $table,    //table
    array(    //set
        'show' => $set_show,
        ), 
    array(     //where
        'id' => $post_id,
        )
    );
$dnt->redirect(WWW_PATH_ADMIN."index.php?src=".$rest->get("src")."&included=".$rest->get("type")."&filter=".$rest->get("filter")."");



