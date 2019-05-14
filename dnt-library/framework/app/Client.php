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
	public $domainWww;
	public $originProtocol;
	public $clients;
	public $init;
	
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
	}
	
	protected function id(){
		foreach($this->clients as $client){
			if($this->isIncluded(str_replace("/", "", $this->domainNP), str_replace("/", "", $client->real_url)) && $client->show_real_url == 1 && $client->real_url){
				$this->id = $client->id_entity;
				$this->realUrl = $client->real_url;
				$this->showRealUrl = $client->show_real_url;
				$this->layout = $client->layout;
			}elseif($this->url == $client->name_url){
				$this->id = $client->id_entity;
				$this->realUrl = $client->real_url;
				$this->showRealUrl = $client->show_real_url;
				$this->layout = $client->layout;
			}		
		}
	}
	
	protected function removeProtocol(){
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
	}
	
	
	public function route($index){
		$data = ltrim($this->requestNoParam, '/');
		$data = explode("/", $data);
		if(strlen($data[0])== 2){
			$this->lang = $data[0];
			if(isset($data[$index])){
				return $data[$index];
			}
		}else{
			if(isset($data[$index-1])){
				return $data[$index-1];
			}
		}
	}
	
	protected function domainParser($dbDomain){
		$www 			= false;
		$protocol 		= false;
		$domain 		= false;
		$www_folders 	= false;
		
		$data = explode("://", $dbDomain);
		if(isset($data[0])){
			$protocol = $data[0]."://";
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
		);
		

	}
	
	protected function redirect($domain){
		header("Location: $domain");
	}
	
	public function setDomain($dbDomain, $toDbDomain = true){
		$data = $this->domainParser($dbDomain);
		if($toDbDomain){
			if(
				$this->originProtocol 	== $data['protocol'] &&
				$this->domainNP 		== $data['domain'] &&
				$this->domainWww 		== $data['www']
			){
				//zhoda
				
			}else{
				if($this->showRealUrl){
					if($data['www']){
						$www = "www.";
					}else{
						$www = "";
					}
					$newDomain = $data['protocol'].$www.$data['domain'].$this->request;
					$this->redirect($newDomain);
					exit;
				}
			}
		}else{ //change protocol
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
			$this->removeProtocol();
			$this->clients();
			$this->url();
			$this->id();
			$this->init = true;
		}
	}
}
