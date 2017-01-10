<?php

class Vendor{
	
    var $vendor_url; //this vendor URL
    var $vendor_id; //this vendor ID
	
	
	public function getVendorUrl(){
		
		$hosts = explode(".", $_SERVER['HTTP_HOST']);
		$host = $hosts[0];
		
		if($host == "www"){
			$this->vendor_url = $hosts[1];
		}
		elseif($host == $_SERVER['HTTP_HOST']){ //ak nie je subdomena, tak vrati false
			$this->vendor_url = false;
		}
		else{
			$this->vendor_url =  $host;
		}
		
		return $this->vendor_url;
		
	}
	
	
	public function getId(){
		
		return VENDOR_ID;
		/*$db = new DB();//get instance
		
		$query = "SELECT id FROM `dnt_vendors` WHERE
		`parent_id` = '0' AND
		`url` = '".$this->vendor_url."' AND
		`aktivne` = '1' LIMIT 1";
		
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				$this->vendor_id = $row['id'];
			}
		}
		else{
			$this->vendor_id = false;
		}
		
		return $this->vendor_id;
		*/
		
	}
	
}