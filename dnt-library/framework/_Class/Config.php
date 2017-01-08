<?php

class Config{
	
	
	public function getValue($key){
		
		$db = new DB();//get instance
		
		$query = "SELECT value FROM `dnt_config` WHERE
		`vendor_id` = '".VENDOR_ID."' AND
		`key` = '".$key."' LIMIT 1";
		
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				$this->value = $row['value'];
			}
		}
		else{
			$this->value = false;
		}
		
		return $this->value;
		
	}
	
}