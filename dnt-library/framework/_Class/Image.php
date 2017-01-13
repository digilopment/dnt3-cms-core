<?php

Class Image{
	
	public function get($id){
		$db = new Db;
		$query = "SELECT img FROM dnt_posts WHERE `id` = '".$id."'";
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				return $row['img'];
			}
		}else{
			return false;
		}
	}
	
	public function getPostImage($id){
		$db = new Db;
		$imageId = self::get($id);
		
		$query = "SELECT name FROM dnt_uploads WHERE `id` = '".$imageId."' AND `vendor_id` = '".VENDOR_ID."'";
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				return WWW_PATH_FILES."".$row['name'];
			}
		}else{
			return false;
		}
	
	}
	

}