<?php
$post_id = $rest->get("post_id");
$query = "SELECT `show` FROM dnt_mailer_mails WHERE id_entity = '".$post_id."' AND vendor_id = '".Vendor::getId()."'";
if($db->num_rows($query)>0){
 foreach($db->get_results($query) as $row){
     $show = $row['show'];
 }
}

if($show == 0){
    $set_show = 1;
}
elseif($show == 1){
    $set_show = 2;
}else{
    $set_show = 0;
}
$table = "dnt_mailer_mails";
$db->update(
    $table,    //table
    array(    //set
        'show' => $set_show,
        ), 
    array(     //where
        'id_entity' => $post_id,
        'vendor_id' => Vendor::getId(),
        )
    );
$dnt->redirect(WWW_PATH_ADMIN_2."index.php?src=".$rest->get("src")."&included=".$rest->get("included")."&filter=".$rest->get("filter")."&page=".$rest->get("page"));



