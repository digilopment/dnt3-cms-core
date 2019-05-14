<?php

/**
 *  class       Autoload
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class Client extends Db{

	public $id;
	public $url;
	public $domain;
	public $domainNP;
	public $originProtocol;
	public $clients;
	
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
			}elseif($this->url == $client->name_url){
				$this->id = $client->id_entity;
			}		
		}
	}
	
	protected function removeProtocol(){
        $data = str_replace("www.", "", WWW_PATH);
        $data = explode("://", $data);
        $ORIGIN_PROTOCOL = "" . $data[0] . "://";
        $data = explode("/", $data[1]);
        $ORIGIN_DOMAIN = HTTP_PROTOCOL . $data[0] . "" . WWW_FOLDERS . "";
        $ORIGIN_DOMAIN_NP = $data[0] . "" . WWW_FOLDERS . "";
		$this->domainNP = $ORIGIN_DOMAIN_NP;
		$this->originProtocol = $ORIGIN_PROTOCOL;
	}
	

	
	public function init(){
		$this->removeProtocol();
		$this->clients();
		$this->url();
		$this->id();
	}
}
