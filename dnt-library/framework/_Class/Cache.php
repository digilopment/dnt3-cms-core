<?php

//Module cachuje len vtedy, ak sa jedna o adresu, ktorá je rewritovaná PR: http://localhost/www/abc
//Ak sa jedná o adresu, ktorá nie je rewritovaná, modul necachuje		PR: http://localhost/www/index.php?src=abc 
//Obe adresy vyssie su zhodne, teda vracaju rovnaky conten
//Rewritovana adresa je len vtedy, ak sa namiesto `index.php?src=` nahradi nicim

class Cache {

    // Pages you do not want to Cache:
    var $doNotCache = array("admin","profile");

    // General Config Vars
    var $cacheDir = "dnt-cache";
    var $cacheTime = CACHE_TIME_SEC; //in seconds
    var $caching = false;
    var $cacheFile;
    var $cacheFileName;
    var $cacheLogFile;
    var $cacheLog;
	
	var $CACHE_ADDR;

    function __construct(){
        $this->cacheFile = base64_encode($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        $this->cacheFileName = $this->cacheDir.'/'.$this->cacheFile.'.txt';
        $this->cacheLogFile = $this->cacheDir."/log.txt";
        if(!is_dir($this->cacheDir)) mkdir($this->cacheDir, 0755);
        if(file_exists($this->cacheLogFile))
            $this->cacheLog = unserialize(file_get_contents($this->cacheLogFile));
        else
            $this->cacheLog = array();
    }

    function start(){
		$dntLog = new DntLog;
        $location = array_slice(explode('/',$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']), 2);
        if(!in_array(@$location[0],$this->doNotCache)){
            if(file_exists($this->cacheFileName) && (time() - filemtime($this->cacheFileName)) < @$this->cacheTime && @$this->cacheLog[@$this->cacheFile] == 1 ){
				$dntLog->add(
					array(
						"http_response" 	=> CACHE_HTTP_STATUS,
						"system_status" 	=> "cache",		
						"msg"				=> "Status done, reading cache", 
						)
				);
				
				
                $this->caching = false;
                echo file_get_contents($this->cacheFileName); //show cache file...
                exit(); //stop reading PHP 
            }else{
                $this->caching = true;
                ob_start();
            }
        }
    }

    function end(){
        if($this->caching){
            @file_put_contents($this->cacheFileName,ob_get_contents());
            ob_end_flush();
            $this->cacheLog[$this->cacheFile] = 1;
            if(file_put_contents($this->cacheLogFile,serialize($this->cacheLog)))
                return true;
        }
    }

    function purge($location){
        $location = base64_encode($location);
        $this->cacheLog[$location] = 0;
        if(file_put_contents($this->cacheLogFile,serialize($this->cacheLog)))
            return true;
        else
            return false;
    }

    function purge_all(){
        if(file_exists($this->cacheLogFile)){
            foreach($this->cacheLog as $key=>$value) $this->cacheLog[$key] = 0;
            if(file_put_contents($this->cacheLogFile,serialize($this->cacheLog)))
                return true;
            else
                return false;
        }
    }
	
	public function deleteOld(){
		$dnt = new Dnt;
		$dir = "dnt-cache/";
		if (is_dir($dir)){
		  if ($dh = opendir($dir)){
			while (($filename = readdir($dh)) !== false){
				$dateArr = explode(" ", date ("F d Y H:i:s.", filemtime($dir.$filename)));
				$datum_mesiac = $dateArr[0];
				$datum_den = $dateArr[1];
				$datum_rok = $dateArr[2];
				
				if($datum_den != "01"){ //prvy den v mesiaci sa nemaze
					if($datum_den < $dnt->dvojcifernyDatum($dnt->get_den())){
						//echo "$dir.$filename was last modified: " . date ("m d Y H:i:s.", filemtime($dir.$filename))."<br/>";
						//echo $datum_den."<br/>";
						@unlink($dir.$filename);
					}
				}
			}
			closedir($dh);
		  }
		}
	}

}