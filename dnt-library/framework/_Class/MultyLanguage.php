<?php
class MultyLanguage{
	
	public function getLang(){
		$rest = new Rest;
		return $rest->webhook(0);
	}
	
	public function getLangs($frontend = false){
		if($frontend == true){
			return  "SELECT * FROM dnt_languages WHERE `show` = '1' AND vendor_id = '".Vendor::getId()."'";
		}else{
			return  "SELECT * FROM dnt_languages WHERE `home_lang` = '0' AND `show` = '1' AND vendor_id = '".Vendor::getId()."'";
		}
	}
	
	public function getDefault($id, $table, $column){
		$db 	= new Db;
		
		$query 	= "SELECT `$column` FROM $table WHERE id = '$id' AND vendor_id = '".Vendor::getId()."'";
		if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
			   return $row[$column];
		   }
		 }else{
			 return false;
		 }
	}
	
	public function changeLanguage($lang){
		$rest 	= new Rest;
		$scale	= explode(self::getLang(), WWW_FULL_PATH);
		if(isset($scale[1])){
			$after_lang = $scale[1];
		}else{
			$scale	= explode(WWW_PATH, WWW_FULL_PATH);
			$after_lang = $scale[1];
		}
		
		$return_url = WWW_PATH."".$lang."".$after_lang;
		$return_url = str_replace("///", "/", $return_url);
		$return_url = str_replace("//", "/", $return_url);
		$return_url = str_replace(":/", "://", $return_url);
		return $return_url;
	}
	
	
	public function getTranslateLang($data){
		
		$translate_id 	= isset($data['translate_id']) ? $data['translate_id'] : false;
		$type 			= isset($data['type']) ? $data['type'] : false;
		$table 			= isset($data['table']) ? $data['table'] : false;
		//$default 		= isset($data['default']) ? $data['default'] : false;
		$lang_id 		= isset($data['lang_id']) ? $data['lang_id'] : false;
		
		//return $data['lang_id'];
		
		$db = new Db;
		
		$query = "SELECT `translate` FROM `dnt_translates` WHERE
			`parent_id` = '0' AND
			`vendor_id` = '".Vendor::getId()."' AND
			`lang_id` = '".$lang_id."' AND
			`translate_id` = '".$translate_id."' AND
			`type` = '".$type."' AND
			`table` = '".$table."'
			";
			//$default = $this->getDefault($translate_id, $table, $type);
		if($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				$return = $row['translate'];
			}
		}else{
			$return = false;
		}
		return $return;
	}
	
	public function getTranslate($data){
		
		$translate_id 	= isset($data['translate_id']) ? $data['translate_id'] : false;
		$type 			= isset($data['type']) ? $data['type'] : false;
		$table 			= isset($data['table']) ? $data['table'] : false;
		$default 		= isset($data['default']) ? $data['default'] : false;
		
		$db = new Db;
		
		if($type == "static"){
			$query = "SELECT `translate` FROM `dnt_translates` WHERE
			`parent_id` = '0' AND
			`vendor_id` = '".Vendor::getId()."' AND
			`lang_id` = '".$this->getLang()."' AND
			`translate_id` = '".$translate_id."' AND
			`type` = '".$type."'
			";
			$default = false;
		}else{
			$query = "SELECT `translate` FROM `dnt_translates` WHERE
			`parent_id` = '0' AND
			`vendor_id` = '".Vendor::getId()."' AND
			`lang_id` = '".$this->getLang()."' AND
			`translate_id` = '".$translate_id."' AND
			`type` = '".$type."' AND
			`table` = '".$table."'
			";
			$default = $this->getDefault($translate_id, $table, $type);
		}
		if($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				$return = $row['translate'];
			}
		}else{
			$return = $default;
		}
		return $return;
	}
}