<?php
$post_id = $rest->get("post_id");
$query = "SELECT `order` FROM dnt_posts WHERE id_entity = '".$post_id."' AND vendor_id = '".Vendor::getId()."'";
if($db->num_rows($query)>0){
 foreach($db->get_results($query) as $row){
     $order = $row['order'];
 }
}

$order = $order +1;

$table = "dnt_posts";
$db->update(
    $table,    //table
    array(    //set
        'order' => $order,
        ), 
    array(     //where
        'id' => $post_id,
        )
    );
$dnt->redirect(WWW_PATH_ADMIN."index.php?src=".$rest->get("src")."&included=".$rest->get("included")."&filter=".$rest->get("filter")."");


