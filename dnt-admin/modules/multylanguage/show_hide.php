<?php

use DntLibrary\Base\Vendor;


$post_id = $rest->get("post_id");
 $query = "SELECT * FROM `dnt_languages` WHERE 
                   parent_id = '0' AND
				   id_entity = '".$post_id."' AND
                   vendor_id = '".$vendor->getId()."' ORDER BY id_entity asc"; 
if($db->num_rows($query)>0){
 foreach($db->get_results($query) as $row){
     $show = $row['show'];
 }
}
if($show == 0){
    $set_show = 1;
}
elseif($show == 1){
    $set_show = 0;
}else{
    $set_show = 0;
}
$table = "dnt_languages";
$db->update(
    $table,    //table
    array(    //set
        'show' => $set_show,
        ), 
    array(     //where
        'id_entity' => $post_id,
        'vendor_id' => $vendor->getId(),
        )
    );
$dnt->redirect(WWW_PATH_ADMIN_2."index.php?src=".$rest->get("src")."&included=".$rest->get("included")."&filter=".$rest->get("filter")."");



