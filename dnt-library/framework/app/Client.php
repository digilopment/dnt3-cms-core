<?php

/**
 *  class       Autoload
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class Client extends Database{

	public $id;
	public $wwwPath = WWW_PATH;
	public $url;
	public $lang;
	public $layout;
	public $realUrl;
	public $showRealUrl;
	public $domain;
	public $domainNP;
	public $request;
	public $requestNoParam;
	public $requestNoLang;
	public $domainWww;
	public $originProtocol;
	public $clients;
	public $init;
	public $settings;
	
	protected function url() {
        $hosts = explode(".", @$_SERVER['HTTP_HOST']);
        $host = $hosts[0];

        if ($host == "www") {
            $this->url = $hosts[1];
        } elseif ($host == @$_SERVER['HTTP_HOST']) { //ak nie je subdomena, tak vrati false
            $this->url = false;
        } else {
            $this->url = $host;
        }
    }
	
	protected function isIncluded($pharse, $str) {
        return preg_match('/' . $pharse . '/', $str);
    }
	
	protected function clients(){
		$query = "SELECT * FROM `dnt_vendors`";
		if ($this->num_rows($query) > 0) {
			$this->clients = $this->get_results($query, true);
		}
		foreach($this->clients as $client){
			if($client->real_url){
				$client->real_url = rtrim($client->real_url, "/");
			}
		}
	}
	
	protected function loadSettings(){
		$query = "SELECT * FROM dnt_settings WHERE `vendor_id` = '" . $this->id . "'";
        if ($this->num_rows($query) > 0) {
			$this->settings = $this->get_results($query, true);
		}
	}
	
	public function getSetting($key){
		foreach($this->settings as $setting){
			if($setting->key == $key){
				return $setting->value;
			}
		}
		return false;
	}
	
	protected function id(){
		$hasMatch = 0;
		
		foreach($this->clients as $client){
			
			if($client->real_url){
				$realUrlNp = explode("://", $client->real_url);
				$realUrlNp = $realUrlNp[1];
				if(
					//str_replace("/", "", $this->domainNP.$this->route(0)) == str_replace("/", "", $realUrlNp) && 
					(
					str_replace("/", "", $this->domainNP.$this->urlHooks(0)) == str_replace("/", "", $realUrlNp) ||
					str_replace("/", "", "www.".$this->domainNP.$this->urlHooks(0)) == str_replace("/", "", $realUrlNp)
					)
					&& 
					$client->show_real_url == 1 
					&& $hasMatch == 0
					&& $client->real_url
				   ){
					$hasMatch = 1;
					$this->id = $client->id_entity;
					$this->realUrl = $client->real_url;
					$this->showRealUrl = $client->show_real_url;
					$this->layout = $client->layout;
				}
			}
		}
		
		foreach($this->clients as $client){
			if($client->real_url){
				$realUrlNp = explode("://", $client->real_url);
				$realUrlNp = $realUrlNp[1];
				
				if(
					(
					str_replace("/", "", $this->domainNP) == str_replace("/", "", $realUrlNp) ||
					str_replace("/", "", "www.".$this->domainNP) == str_replace("/", "", $realUrlNp) 
					)
					
					&& $hasMatch == 0){
					$hasMatch = 1;
					$this->id = $client->id_entity;
					$this->realUrl = $client->real_url;
					$this->showRealUrl = $client->show_real_url;
					$this->layout = $client->layout;
				}
			}
		}
		
		foreach($this->clients as $client){
			if($this->url == $client->name_url && $hasMatch == 0){
				$hasMatch = 1;
				$this->id = $client->id_entity;
				$this->realUrl = $client->real_url;
				$this->showRealUrl = $client->show_real_url;
				$this->layout = $client->layout;
			}
		}
		//var_dump($this->id);exit;
	}
	
	
	protected function rootDomainParser(){
		if($this->isIncluded("www.", WWW_PATH)){
			$this->domainWww = "www";
		}
		
		$data = str_replace("www.", "", WWW_PATH);
		$data = WWW_PATH;
        $data = explode("://", $data);
        $ORIGIN_PROTOCOL = "" . $data[0] . "://";
        $data = explode("/", $data[1]);
        $ORIGIN_DOMAIN = HTTP_PROTOCOL . $data[0] . "" . WWW_FOLDERS . "";
        $ORIGIN_DOMAIN_NP = $data[0] . "" . WWW_FOLDERS . "";
		
		$this->domainNP = $ORIGIN_DOMAIN_NP;
		$this->originProtocol = $ORIGIN_PROTOCOL;
		$this->request = explode($this->domainNP, WWW_FULL_PATH)[1];
		$this->requestNoParam = explode("?", $this->request)[0];
		
		if($this->urlLang()){
			$this->requestNoLang = explode($this->urlLang(), $this->requestNoParam)[1];
		}else{
			$this->requestNoLang = $this->requestNoParam;
		}
	}
	
	/*protected function removeProtocol(){
		if($this->isIncluded("www.", WWW_PATH)){
			$this->domainWww = "www";
		}
		
		$data = str_replace("www.", "", WWW_PATH);
        $data = explode("://", $data);
        $ORIGIN_PROTOCOL = "" . $data[0] . "://";
        $data = explode("/", $data[1]);
        $ORIGIN_DOMAIN = HTTP_PROTOCOL . $data[0] . "" . WWW_FOLDERS . "";
        $ORIGIN_DOMAIN_NP = $data[0] . "" . WWW_FOLDERS . "";
		$this->domainNP = $ORIGIN_DOMAIN_NP;
		$this->originProtocol = $ORIGIN_PROTOCOL;
		$this->request = explode($this->domainNP, WWW_FULL_PATH)[1];
		$this->requestNoParam = explode("?", $this->request)[0];
		
		if($this->route(0)){
			$tmp = $this->requestNoLang = explode("?", $this->request);
			$tmp = ltrim($tmp[0], '/');
			$tmp = explode($this->route(0)."/", $tmp);
			if($tmp[0]){
				$this->requestNoLang = $tmp[0];
			}else{
				if($tmp[0] == "" && !isset($tmp[1])){
					$this->requestNoLang = false;
				}else{
					$this->requestNoLang = $tmp[1];
				}
			}
			$this->requestNoLang = "/".$this->requestNoLang; 
			//var_dump($this->route(0));
			//$this->requestNoLang = explode("?", explode($this->route(0), $this->request)[1])[0];
		}else{
			$this->requestNoLang = explode("?", $this->request)[0];
		}
	}*/
	
	
	public function route($index){
		//var_dump($this->requestNoParam);
		$data = ltrim($this->requestNoParam, '/');
		$data = explode("/", $data);
		//var_dump($this->requestNoParam);
		//var_dump($this->requestNoLang);
		if($index === false){
			if($this->urlLang()){
				$this->routes = $data;
				$this->lang = $this->urlLang();
			}else{
				//$this->lang = Settings::get("language");
				$this->lang = $this->getSetting("language");
				$this->routes = array_merge(array($this->lang), $data);
			}
		}else{
			if(isset($this->routes[$index]) && $this->routes[$index] != ""){
				return $this->routes[$index];
			}
			/*if(strlen($data[0])== 2){
				$this->lang = $data[0];
				$this->routes = $data;
				if(isset($data[$index])){
					return $data[$index];
				}
			}else{
				//$this->lang = Settings::get("language");
				$this->lang = $this->getSetting("language");
				$this->routes = array_merge(array($this->lang), $data);
				if(isset($this->routes[$index])){
					return $this->routes[$index];
				}
			}*/
		}
		//var_dump($this->routes);
		//exit;
	}
	
	protected function domainParser($dbDomain){
		$www 			= false;
		$protocol 		= false;
		$domain 		= false;
		$www_folders 	= false;
		$lang 			= false;
		
		$data = explode("://", $dbDomain);
		if(isset($data[0])){
			$protocol = $data[0]."://";
		}
		
		$dataLng = explode("/", $data[1]);
		$lng = $dataLng[count($dataLng)-1];
		if(strlen($lng)==2){
			$lang = $lng;
		}
		
		
		if($this->isIncluded(str_replace("/", "~", WWW_FOLDERS), str_replace("/", "~", $dbDomain))){
			$www_folders = WWW_FOLDERS;
		}
			
		if(isset($data[1])){
			$domain = $data[1];
			$domain = str_replace("www.", "", $domain);
			$domain = explode("/", $domain);
			$domain = $domain[0];
			
			if($www_folders){
				$domain = $domain."".$www_folders;
			}
		}
		
		if($this->isIncluded("www", $dbDomain)){
			$www = "www";
		}
		
		return array(
			"www" 			=> $www,
			"protocol" 		=> $protocol,
			"domain" 		=> $domain,
			"www_folders" 	=> $www_folders,
			"lang" 			=> $lang,
		);
		

	}
	
	protected function redirect($domain){
		header("Location: $domain");
	}
	
	public function urlLang(){
		$urlLang = explode("/", ltrim($this->request, "/"))[0];
		if(strlen($urlLang)==2){
			return $urlLang;
		}else{
			return false;
		}
	}
	
	public function urlHooks($index){
		$hooks = explode("/", ltrim($this->request, "/"));
		if(isset($hooks[$index])){
			return $hooks[$index];
		}else{
			return false;
		}
	}
	
	public function setDomain($dbDomain, $toDbDomain = true, $language = false){

		$data = $this->domainParser($dbDomain);
		if($data['www']){
			$www = "www.";
		}else{
			$www = "";
		}
		if($toDbDomain){
			//presmerovanie z default lang na no-lang
			if($this->urlLang($this->request) == $language && $data['lang'] == false){
				$newDomain = $data['protocol'].$www.$data['domain'].$this->requestNoLang;
				$this->redirect($newDomain);
				exit;
			}
			//presmerovanie na protocol
			if(
				$this->originProtocol 	== $data['protocol'] &&
				$this->domainNP 		== $www.$data['domain'] &&
				($this->route(0)		== $language || $language == "") &&
				$this->domainWww 		== $data['www']
			){
				//zhoda
			}else{
				if($this->showRealUrl){
					if($language){
						$newDomain = $data['protocol'].$www.$data['domain']."/".$language.$this->requestNoLang;
					}else{
						$newDomain = $data['protocol'].$www.$data['domain'].$this->request;
					}
					$this->redirect($newDomain);
					exit;
				}
			}
		}else{ //change protocol local domain
			if($this->originProtocol == $data['protocol']){
				//zhoda
			}else{
				if($data['protocol'] == "https://"){
					$newDomain = str_replace("http:", "https:", WWW_FULL_PATH);
					$this->redirect($newDomain);
					exit;
				}
				if($data['protocol'] == "http://"){
					$newDomain = str_replace("https:", "http:", WWW_FULL_PATH);
					$this->redirect($newDomain);
					exit;
				}
			}
		}
		
		
	}
	

	
	public function init(){
		if(!$this->init){
			$this->rootDomainParser();
			$this->clients();
			$this->url();
			$this->id();
			$this->loadSettings();
			$this->route(false);
			//$this->removeProtocol();
		}
	}
}
