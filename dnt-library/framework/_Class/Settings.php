<?php
class Settings{
	
	public function get($key){
		$db = new Db;
		$query = "SELECT value FROM dnt_settings WHERE `key` = '".$key."' AND `vendor_id` = '".VENDOR_ID."'";
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				return $row['value'];
			}
		}else{
			return false;
		}
	}
	
	public function getImage($key){
		
		$db = new Db;
		$imageId = Settings::get($key);
		
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


