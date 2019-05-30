<?php

/**
 *  class       Autoload
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class Post extends Client{
	
	public $postsModel 			= array();
	public $postsNavigation 	= array();
	public $postsSubNavigation 	= array();
	
	
	protected function order($data, $column = "id", $sort = "ASC"){
		$sortArray = array(); 
		foreach($data as $item){ 
			foreach($item as $key=>$value){ 
				if(!isset($sortArray[$key])){ 
					$sortArray[$key] = array(); 
				} 
				$sortArray[$key][] = $value; 
			}
			if($column == "datetime_publish"){
				$sortArray['datetime'][] = strtotime($item[$column]);
				$orderby = "datetime";
			}					
		} 
		
		$orderby = $column;
		
		if($sort == "ASC" || $sort == "asc"){
			array_multisort($sortArray[$orderby],SORT_ASC,$data);
		}else{
			array_multisort($sortArray[$orderby],SORT_DESC,$data);
		}
		return $data;
			
	}
	
	protected function postsModel(){
		$client = new Client();
		$client->init();
		$query = "SELECT * FROM `dnt_posts` WHERE vendor_id = '".$client->id."'";
		if ($this->num_rows($query) > 0) {
			$this->postsModel = $this->get_results($query, true);
		}
	}
	
	protected function postsNavigation(){
		foreach($this->postsModel as $model){
			if($model->type == "sitemap" && $model->show>0 && $model->sub_cat_id == ""){
				$this->postsNavigation[] = $model;
			}
		}
		if($this->postsNavigation){
			$this->postsNavigation = $this->order($this->postsNavigation, "order", "desc");
		}
	}
	
	protected function postsSubNavigation(){
		foreach($this->postsModel as $model){
			if($model->type == "sitemap" && $model->show>0 && $model->sub_cat_id != ""){
				$this->postsSubNavigation[] = $model;
			}
		}
		if($this->postsSubNavigation){
			$this->postsSubNavigation = $this->order($this->postsSubNavigation, "order", "desc");
		}
	}
	
	protected function getPosts($confArray){
		
		$show 	= isset($confArray['show'])  ? $confArray['show'] : false;
		$order 	= isset($confArray['order']) ? $confArray['order'] : false;
		$ofset 	= isset($confArray['ofset']) ? $confArray['ofset'] : false;
		$type 	= isset($confArray['type'])  ? $confArray['type'] : false;
		
		foreach($this->postsModel as $model){
			if($show){
				if($model->show>0){
					$this->postsNavigation[] = $model;
				}
			}
			if($type){
				if($model->show>0){
					$this->postsNavigation[] = $model;
				}
			}
		}
		
	}
	
	public function init(){
		$this->postsModel();
		$this->postsNavigation();
		$this->postsSubNavigation();
	}
	
}