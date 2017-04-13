<?php
class Webhook {
	
	/*
	 *
	 * returns array
	 * array of sitempas hook(s)
	 *
	*/ 
	public function getSitemapModules(){
		$db = new Db;
		$arr = array();
		//$query = "SELECT `name_url` FROM dnt_posts WHERE `type` = 'sitemap' AND `show` > '0' AND vendor_id = '".Vendor::getId()."'";
		$query = "SELECT `name_url` FROM dnt_posts WHERE `show` > '0' AND vendor_id = '".Vendor::getId()."'";
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				$arr[] = $row['name_url'];
			}
		}else{
			$arr = array(false);
		}
		//return $arr;
		
		//$query = "SELECT `translate` FROM dnt_translates WHERE `type` = 'name_url' AND `show` = '1' AND vendor_id = '".Vendor::getId()."'";
		$query = "SELECT `translate` FROM dnt_translates WHERE `type` = 'name_url' AND translate <> '' AND vendor_id = '".Vendor::getId()."'";
			if ($db->num_rows($query) > 0){
				foreach($db->get_results($query) as $row){
					$arr2[] = $row['translate'];
				}
			}else{
				$arr2 = array(false);
			}
			
		return array_merge($arr, $arr2);
	}
	
	/*
	 *
	 * returns array
	 * array of articles cat(s)
	 *
	*/ 
	public function getArticleViewCat(){
		$db = new Db;
		$arr = array();
		$query = "SELECT `name_url` FROM dnt_posts WHERE `type` = 'sitemap' AND `show` > '0' AND vendor_id = '".Vendor::getId()."'";
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				$arr[] = $row['name_url'];
			}
		}else{
			$arr = array(false);
		}
		
		return $arr;
		/*
		$query = "SELECT `translate` FROM dnt_translates WHERE `type` = 'name_url' AND translate <> '' AND vendor_id = '".Vendor::getId()."'";
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
				$arr2[] = $row['translate'];
			}
		}else{
			$arr2 = array(false);
		}
		return array_merge($arr, $arr2);
		*/
	}
	
	
	/*
	 *
	 *DNT GLOBAL WEBHOOK CONFIGURATION
	 *key_array -> represent modul service
	 *array_alue-> represent the hook get PARAMETER 
	 *
	 *
	*/
	public function get($custom_modules = false){
		
		if($custom_modules == false){
			$custom_modules = array(array(false));
		}else{
			$custom_modules = $custom_modules;
		}
		
		/*
		$custom_modules = array(
			"contact" => array(
				"kontakt",
				"contact",
			),
			"sponsors" => array(
				"sponzori",
				"sponsors",
			),
		);
		*/
		
		$modules = array(
			//homepage
			/*"homepage" => array(
							"domov",
							"home",
						),
		*/
			
			
			//article view
			/*"article_view" => array(
							"clanok",
							"post",
						),//sitemaps webhooks*/
			
			"static_view" => array_merge(
				array( //static webhooks
					"a",
				),
				$this->getSitemapModules()), //sitemaps webhooks
			
			//article list
			/*"article_list" => array(
							"clanky",
							"posts",
						),*/
			
			//404
			"default" => array(
							"error-404",
							"not-found",
						),
			//404
			"rpc" => array(
							"rpc",
						),
			//polls
			"polls" => array(
							"ankety",
							"kvizy",
							//"tomas",
						),
		);
		//var_dump($getCustomSitemapModule);
		//var_dump($modules);
		$modules = array_merge($custom_modules, $modules);
		//var_dump($modules);
		return $modules;
	}
}
