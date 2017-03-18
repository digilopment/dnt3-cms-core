<?php

class Vendor{
	
    var $vendor_url; //this vendor URL
    var $vendor_id; //this vendor ID
	
	
	public static function getVendorUrl(){
		
		$hosts = explode(".", @$_SERVER['HTTP_HOST']);
		$host = $hosts[0];
		
		if($host == "www"){
			$this->vendor_url = $hosts[1];
		}
		elseif($host == @$_SERVER['HTTP_HOST']){ //ak nie je subdomena, tak vrati false
			$this->vendor_url = false;
		}
		else{
			$this->vendor_url =  $host;
		}
		
		return $this->vendor_url;
		
	}
	
	
	public static function getId(){
		$db 	= new Db;
		$host = explode(".", $_SERVER["HTTP_HOST"]);
		
		//ak je host[1] existuje subdomena
		if(isset($host[1])){
			$vendor_url = $host[0];
			$status		= "url";
		}else{
			$vendor_url = false;
			$status		= "default";
		}
		
		$query = "SELECT `id` FROM `dnt_vendors` WHERE
		name_url = '".$vendor_url."'";
		
		if($db->num_rows($query)>0){
			foreach($db->get_results($query) as $row){
				$vendor_id =  $row['id'];
			}
		}else{
			$query2 = "SELECT `id` FROM `dnt_vendors` WHERE `is_default` = '1'";
			if($db->num_rows($query2)>0){
				foreach($db->get_results($query2) as $row2){
					$vendor_id = $row2['id'];
				}
			}else{
				$vendor_id = false;
			}
		}
		
		return $vendor_id;
	}
	
	public static function getLayout(){
		$db 	= new Db;
		
		$query = "SELECT `layout` FROM `dnt_vendors` WHERE
		id = '".self::getId()."'";
		
		if($db->num_rows($query)>0){
			foreach($db->get_results($query) as $row){
				$layout =  $row['layout'];
			}
		}else{
			$layout = false;
		}
		
		return $layout;
	}
	
}

