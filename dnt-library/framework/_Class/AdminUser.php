<?php
class AdminUser{
	
	public function validProcessLogin($type, $email, $pass){
		$db = new Db;
		$query = "SELECT pass FROM dnt_users WHERE type = '$type' AND email = '".$email."' ";
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
	
	public function data($type, $column){
		$db = new Db;
		$session = new Sessions();
		$query = "SELECT $column FROM dnt_users WHERE type = '$type' AND email = '".$session->get("admin_id")."'";
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				return $row[$column];
			}
		}else{
			return false;
		}
	}
	
	public function avatar(){
		return WWW_PATH_FILES."".AdminUser::data("admin", "img");
	}
	
}

