<?php

Class Image{
	
	public function get($id, $table = null){
		$db = new Db;
		$query = "SELECT img FROM $table WHERE `id` = '".$id."'";
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				return $row['img'];
			}
		}else{
			return false;
		}
	}
	
	public function getFileImage($id){
		$db = new Db;
		$imageId = $id;
		//`show` = '0' or `show` = '1' or `show` = '2'";
		$query = "SELECT name FROM dnt_uploads WHERE 
		`id` = '".$imageId."' AND 
		`vendor_id` = '".Vendor::getId()."' AND 
		".Dnt::showStatus("show")."";
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				return WWW_PATH."dnt-view/data/".Vendor::getId()."/".$row['name'];
			}
		}else{
			return false;
		}
	
	}
	
	public function getPostImage($id, $table = null){
		$db = new Db;
		
		if(null === $table){
			$table = "dnt_posts";
		}else{
			$table = $table;
		}
		$imageId = self::get($id, $table);
		return self::getFileImage($imageId);
		
		/*
		$query = "SELECT name FROM dnt_uploads WHERE `id` = '".$imageId."' AND `vendor_id` = '".Vendor::getId()."'";
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				return WWW_PATH."dnt-view/data/".Vendor::getId()."/".$row['name'];
			}
		}else{
			return false;
		}
		*/
	
	}
	

}