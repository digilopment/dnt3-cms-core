<?php
/*
 *
 * The Rest protocol developed by Tomas Doubek
 * thomas.doubek@gmail.com
 *
 *
*/
class Rest{
	
    var $get; //variable of get result
    var $post; //variable of get post
    var $escape; //variable of get escape
    
	//this method creat a GET method of `default` and `rewrited` addr
	public function get($get){
		
		@$addr1 = explode($get."=", WWW_FULL_PATH);
		@$addr  = $addr1[1];
		
		if(explode("&", @$addr1[1]) == true){
			@$addr2 = explode("&", $addr1[1]);
			$this->get = $addr2[0];
		}
		else{
			$this->get = $addr;
		}
		return $this->get;
		
	}
	
	public function webhook($thisArg){
		if(isset($_GET[SRC])){
			$arr = array();
			$src = $_GET[SRC];
			$arr = explode("/", $src);
			if($arr[0] == "sk" || $arr[0] == "en" || $arr[0] == "de" || $arr[0] == "cz"){
				if(isset($arr[$thisArg])){
					return $arr[$thisArg];
				}
				else{
					return false;
				}
			}else{				
				$arr = explode("/", "sk/".$src);
				if(isset($arr[$thisArg])){
					return $arr[$thisArg];
				}
				else{
					return false;
				}
			}
		}else{
			if($thisArg == 0){
				return DEAFULT_LANG;
			}
			if($thisArg == 0){
				return DEAFULT_MODUL;
			}
		}
	}

	
	public function getModul(){
		$webhook = new Webhook;
		$this->webhook = $webhook->get();
		foreach(array_keys($this->webhook) as $this->index){
			foreach($this->webhook[$this->index] as $this->key=>$this->value){
				if($this->webhook(1) == ""){
					return DEAFULT_MODUL; //ak nie je nasetovana url adresa tak nastav defaultny webhook
				}
				if($this->value == $this->webhook(1)){
					return $this->index;
				}
			}
		}
	}
	
	public function loadModul(){
		if($this->getModul()){
			$function = "dnt-modules/".$this->getModul()."/functions.php";
			$template = "dnt-modules/".$this->getModul()."/webhook.php";
			if(file_exists($function))
				include $function;
			if(file_exists($template))
				include $template;
		}
	}
	
	public function loadMyModul($module){
			$function = "dnt-modules/".$module."/functions.php";
			$template = "dnt-modules/".$module."/template.php";
			if(file_exists($function))
				include $function;
			if(file_exists($template))
				include $template;
	}
	
	public function post($post){
		if(isset($_POST[$post])){
			$this->post = @$_POST[$post];
		}else{
			$this->post = false;
		}
		
		return $this->post;
	}
	
	public function setGet($arr){
		
		
		foreach($arr as $key=>$value){
			/*$explodedArr = explode("?$key", WWW_FULL_PATH);
			if(count($explodedArr)>1){
				$get_s[] = "a=b";
			}elseif(count($explodedArr)>1){
				$get_s[] = "a=b";
			}else{
				$get_s[] = "$key=$value";
			}*/
			$get_s[] = "$key=$value";
		}
		
		$params = implode("&", $get_s);
		return WWW_FULL_PATH."&$params";
	}
	
	public function escape($input){
		$this->escape = mysql_real_escape_string($input);
		return $this->escape;
	}
	
}