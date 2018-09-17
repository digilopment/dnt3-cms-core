<?php
if(file_exists("../dnt-view/layouts/".Vendor::getLayout()."/modules/".$serviceName."/install/install.php")){
	
	$db = new Db;
	include "../dnt-view/layouts/".Vendor::getLayout()."/modules/".$serviceName."/install/install.php";
	
	$SQL = "INSERT INTO `dnt_posts_meta` (
	`id`, `id_entity`, `post_id`, `service`, `vendor_id`, `key`, `value`, `content_type`, `cat_id`, `description`, `show`
	) VALUES";
	
	
	$db->dbTransaction();
	$DATA = defaultModulMetaDataInstalation($postId, $serviceName);
	$query = $SQL.$DATA['sql'];
	$db->query($query);
	$db->query("UPDATE `dnt_posts_meta` SET `id_entity` = `id` WHERE id_entity = 0 AND vendor_id = '".Vendor::getId()."'");
	$db->dbCommit();
	
	Dnt::redirect("index.php?src=content&included=".$rest->get("included")."&filter=".$rest->get("filter")."&post_id=".$postId."&services=".$serviceName."");
	
}