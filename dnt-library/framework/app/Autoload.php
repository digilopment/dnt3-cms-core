<?php

/**
 *  class       Autoload
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class Autoloader {


	protected function fileLoader($file){
		if(file_exists($file)){
			include $file;
		}
	}
	
    public function load($path) {
        /**
         * CONFIG
         */
        include $path . "dnt-library/framework/_keys/public.php";
		
		if(file_exists($path . "config_pro.dnt")){
			include $path . "config_pro.dnt";
		}else{
			include $path . "config.dnt";
		}
		
		$this->fileLoader($path . "dnt-library/framework/app/Db.php");
		$this->fileLoader($path . "dnt-library/framework/app/Client.php");
		$this->fileLoader($path . "dnt-library/framework/app/Modul.php");
        
    }

}
