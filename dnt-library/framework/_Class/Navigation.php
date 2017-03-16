<?php
class Navigation{
	public function getParents(){
		$db = new Db;
		$query = "SELECT * FROM dnt_posts WHERE 
		type = 'sitemap' AND 
		cat_id = '".AdminContent::getCatId("sitemap")."' AND 
		`show` = '1' ORDER BY `order`";
		if($db->num_rows($query)>0){
			return $db->get_results($query);
		}else{
			return array(false);
		}
	}
	
	public function hasChild($parentId){
		$db = new Db;
		$query = "SELECT * FROM `dnt_posts` WHERE 
		type = 'sitemap' AND 
		`show` = '1' AND 
		sub_cat_id = '".$parentId."' 
		AND vendor_id = '".Vendor::getId()."'";
		if($db->num_rows($query)>0){
			return true;
		}else{
			return false;
		}
	}
	
	public function getChildren($parentId){
		$db = new Db;
		$query = "SELECT * FROM `dnt_posts` WHERE 
		type = 'sitemap' AND 
		`show` = '1' AND 
		sub_cat_id = '".$parentId."' 
		AND vendor_id = '".Vendor::getId()."'";
		if($db->num_rows($query)>0){
			return $db->get_results($query);
		}else{
			return array(false);
		}
	}
}