<?php
class AdminUser extends Image{
	
	public function validProcessLogin($type, $email, $pass){
		$db = new Db;
		$query = "SELECT pass FROM dnt_users WHERE type = '$type' AND email = '".$email."' AND vendor_id = '".Vendor::getId()."'";
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				$db_pass = $row['pass'];
			}
			if($db_pass == md5($pass)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	public function getUserColumns(){
		$columns = new XMLgenerator;
		return $columns->getTableColumns("dnt_users", "*");
	}
	
	public function data($type, $column){
		$db = new Db;
		$session = new Sessions();
		$query = "SELECT $column FROM dnt_users WHERE type = '$type' AND email = '".$session->get("admin_id")."' AND vendor_id = '".Vendor::getId()."'";
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				return $row[$column];
			}
		}else{
			return false;
		}
	}
	
	public function avatar(){
		$imageId = self::data("admin", "img");
		return self::getFileImage($imageId);
	}
	
	public function dataById($type, $column, $id){
		$db = new Db;
		$session = new Sessions();
		$query = "SELECT $column FROM dnt_users WHERE type = '$type' AND id = '".$id."' AND vendor_id = '".Vendor::getId()."'";
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				return $row[$column];
			}
		}else{
			return false;
		}
	}
	public function avatarById($id){
		$imageId = self::dataById("admin", "img", $id);
		return self::getFileImage($imageId);
	}
	
}


