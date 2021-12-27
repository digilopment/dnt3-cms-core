<?php

namespace DntApi;

use DntLibrary\App\Render;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Dnt;

class WeatherForecastApi
{

	const API_HOST = 'https://api.morph.io';
	const API_SCARPER = 'soit-sk/scraper-shmu-observations';
	const API_KEY = 'vSXgYJi4eENlfbXJKsCl';
	
    protected $serviceUrl;
    protected $content;
    protected $endPoint;
    protected $getCity;
	protected $allowReferers = [];
	
	public function __construct()
    {
		$this->rest = new Rest();
		$this->dnt = new Dnt();
    }


	protected function init(){
		
		//$this->simPlCache('abc', '60', 'https://www.google.sk');
		
		$this->endPoint = $this->rest->get('endPoint');
		$this->getCity = $this->rest->get('getCity');
		$this->query = $this->rest->get('query');
		$this->getData();
	}

	protected function setService($query)
	{
		return self::API_HOST . '/' . self::API_SCARPER . '/data.json?key=' . self::API_KEY . '&query=' . $query;
	}
    

	protected function getCities()
	{
		$query = urlencode("select * from data order by date desc LIMIT 51");
		return $this->setService($query);
	}
	
	protected function getCity()
	{
		if($this->getCity){
			$query = urlencode("select * from data WHERE name LIKE '%".$this->getCity."%' order by date desc LIMIT 1");
			return $this->setService($query);
		}
		die('City is not defined');
		exit;
	}
	
	protected function getQuery()
	{
		if($this->query){
			$query = $this->query;
			return $this->setService($query);
		}
		die('Query is not defined');
		exit;
	}
	
	protected function getCityWeather()
	{
		if($this->getCity){
			//return 'https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/'.$this->getCity.'/today?unitGroup=metric&include=current&key=CQCNKBSWJ4LSLCSYL5P37BAQP&contentType=json';
			return 'https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/'.$this->getCity.'/today?unitGroup=metric&include=current&key=ZEBED89LBXBRFE3R8BMXS7KDL&contentType=json';
		}
		die('City is not defined');
		exit;
	}
	
	protected function allowReferers()
    {

        $referer = $_SERVER['HTTP_REFERER'];
        $this->allowReferers = array(
            'digilopment',
            'query',
            'localhost',
        );
        foreach ($this->allowReferers as $singlReferer) {
            if ($this->dnt->in_string($singlReferer, $referer)) {
                return true;
            }
        }
        return false;
    }
	
	protected function getLastForecast()
	{
		$query = urlencode("select * from data order by date desc LIMIT 1");
		return $this->setService($query);
	}
	
	protected function simPlCache($key, $expiry, $service)
	{
		$currentTime = time();
		$hash = $key . '_' . $currentTime;
		$path = 'data/';
		$newCachedFile = $path . $hash.'.cache';
		
		$availableFiles = [];
		foreach(glob($path . $key . '*') as $file){
			$fileCreated = preg_replace("/[^0-9]/","",$file);
			if($currentTime - $fileCreated < $expiry){
				$availableFiles[] = $file;
			}
		}
		
		$cahedFile = count($availableFiles) > 0 ? end($availableFiles) : $newCachedFile;
		if(file_exists($cahedFile)){
			file_get_contents($cahedFile);
		}else{
			file_put_contents($cahedFile, file_get_contents($service));
		}
		exit;
	}
    protected function getData()
    {
		$this->serviceUrl = match($this->endPoint) {
			'cities' => $this->getCities(),
			'city' => $this->getCityWeather(),
			'query' => $this->getQuery(),
			default => $this->getLastForecast(),
		};
		if($this->allowReferers()){
			$content = file_get_contents($this->serviceUrl);
			$this->content = $content;
		}else{
			$this->content = json_encode(['message' => 'No authorization. Please create a correct request or try to request for new availability authorizations. Powered by Dnt3 Platform']);
		}
        
    }

    public function run()
    {
		$this->init();
        (new Render($this->content))->renderWithJson();
    }

}
