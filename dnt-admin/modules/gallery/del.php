<?php
/*
$post_id = $rest->get("post_id");
$where = array( 'id_entity' => $post_id, 'vendor_id' => Vendor::getId());
$db->delete( 'dnt_uploads', $where);

$dnt->redirect(WWW_PATH_ADMIN_2."index.php?src=".$rest->get("src")."");
*/
if(isset($_POST['sent'])){
	//var_dump($_POST);
	
	foreach($_POST as $id => $value){
		$id = str_replace("del_", "",$id);
		if(filter_var($id, FILTER_VALIDATE_INT)) {
			$ids[] = $id; 
		}
	}
	$ids = implode(",", $ids);
	//var_dump($ids);
	$db->query("DELETE FROM dnt_uploads WHERE id_entity IN ($ids) AND vendor_id = '".Vendor::getId()."'");
}else{
	$post_id = $rest->get("post_id");
	if($post_id){
		$post_id = $rest->get("post_id");
		$where = array( 'id_entity' => $post_id, 'vendor_id' => Vendor::getId());
		$db->delete( 'dnt_uploads', $where);
	}else{
		echo 25;
	}
}

$dnt->redirect(WWW_PATH_ADMIN_2."index.php?src=".$rest->get("src")."");


/*
$query = "SELECT `show` FROM dnt_uploads WHERE id = '".$post_id."'";
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
$table = "dnt_uploads";
$db->update(
    $table,    //table
    array(    //set
        'show' => $set_show,
        ), 
    array(     //where
        'id' => $post_id,
        )
    );
$dnt->redirect(WWW_PATH_ADMIN_2."index.php?src=".$rest->get("src")."&filter=".$rest->get("filter")."");
*/



