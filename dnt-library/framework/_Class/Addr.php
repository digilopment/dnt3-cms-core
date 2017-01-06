<?php

class Addr{
	
    var $address; //array of address
    var $module; //this address
		
    function __construct(){
        $this->address = explode(WWW_PATH, WWW_FULL_PATH);
    }
	
    public function getModulePath(){
        return $this->address[1];
    }
	
	public function getModuleUrl(){
		$this->module = explode("/", $this->address[1]);
    }
	
	public function setModuleUrl(){
         return $this->address;
    }
	
}