<?php
class AdminContent extends MultyLanguage{
		
	public function limit(){
		return 20;
	}
	
	public function primaryCat(){
		return array(
			"post" 		=> "Obsah",
			"sitemap" 	=> "Sitemapa",
			"article" 	=> "Články"
		);
	}
		
	public function getCatId($type){
		$db = new Db;
		$query = "SELECT id FROM dnt_post_type WHERE name_url = '".$type."' AND `vendor_id` = '".Vendor::getId()."'";
		if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
			   return $row['id'];
		   }
		 }else{
			 return false;
		 }
	}
	
	protected function prepare_query($is_limit){
		$db = new Db();
		
		
		//default cat
		if(isset($_GET['included']) && $_GET['included'] == "article"){
			$typ = "AND sub_cat_id = '".$_GET['filter']."'";
		}
		elseif(isset($_GET['included']) && $_GET['included'] == "sitemap-sub"){
			$typ = "AND cat_id = '".$_GET['filter']."'";
		}
		elseif(isset($_GET['included']) && $_GET['included'] == "sitemap"){
			$typ = "AND cat_id = '".$_GET['filter']."'";
		}
		elseif(isset($_GET['included']) && $_GET['included'] == "post"){
			$typ = "AND cat_id = '".$_GET['filter']."'";
		}
		
		elseif(isset($_GET['filter']))
			$typ = "AND sub_cat_id = '".$_GET['filter']."'";
		elseif(isset($_GET['search'])){
			$typ = "AND `name_url` LIKE '%".Dnt::name_url($_GET['search'])."%'";
		}
		else
			$typ = false;
		
		if($is_limit == false)
			$limit = false;
		else
			$limit = $is_limit;
		
			$query = "SELECT * FROM `dnt_posts` WHERE  `vendor_id` = '".Vendor::getId()."' ".$typ." ORDER BY `order` DESC ".$limit."";
			return $query;
   	}
	
	
	public function query(){
		$db = new Db;
		
		if(isset($_GET['page'])){
			$returnPage =  "&page=".$_GET['page'];
		}else{
			$returnPage = false;
		}
	
			$query = self::prepare_query(false);
			$pocet = $db->num_rows($query);
			$limit = self::limit();

			if(isset($_GET['page']))
				$strana = $_GET['page'];
			else
				$strana = 1;
															
			$stranok = $pocet / $limit;
			$pociatok=($strana*$limit)-$limit;
															
			$prev_page = $strana - 1;
			$next_page = $strana + 1;
			$stranok_round = ceil($stranok);

			$pager = "LIMIT ".$pociatok.", ".$limit."";
			return self::prepare_query($pager);
   	}
	
	
	public function getPage($index){
		$db = new Db;
		
		if(isset($_GET['page'])){
			$strana = $_GET['page'];
		}
		else{
			$strana = 1;
		}
		
		
		
		$query = self::prepare_query(false);
		$pocet = $db->num_rows($query);
		$limit  = self::limit();
		$stranok = $pocet / $limit;
		$pociatok=($strana*$limit)-$limit;
		
		$stranok_round = ceil($stranok);
		$prev_page = $strana - 1;
			
		if($index == "next"){
			$next_page = $strana + 1;
			if($next_page<=$stranok_round){
				return $next_page;
			}else{
				return $stranok_round;
			}
		}elseif($index == "prev"){
			if($prev_page<1){
				return 1;
			}else{
				return $prev_page;
			}
		}elseif($index == "first"){
			return 1;
		}elseif($index == "last"){
			
			return $stranok_round;
		}
		elseif($index == "current"){
			return $strana;
		}
	}
	
	public function paginator($index){
		$adresa = explode("?", WWW_FULL_PATH);
		if(isset($_GET['page'])){
			$adresa_bez_page = explode("&page=".$_GET['page']."", $adresa[1]); //src=obsah&page=2
			$return = $adresa_bez_page[0];
		}
		else{
			$return = $adresa[1]; //this function return an array
		}
		
		return WWW_PATH_ADMIN."index.php?".$return."&page=".self::getPage($index);
	}
	
	public function url($action, $cat_id, $sub_cat_id, $type, $post_id, $page){
		
		if($action == "filter"){
			return WWW_PATH_ADMIN."index.php?src=content&filter=$cat_id&sub_cat_id=$sub_cat_id&included=$type";
		}else{
			if(isset($_GET['filter'])){
				//return "aa";
				return WWW_PATH_ADMIN."index.php?src=content&filter=$cat_id&sub_cat_id=$sub_cat_id&post_id=$post_id&page=$page&action=$action&included=$type";
			}else{
				return WWW_PATH_ADMIN."index.php?src=content&post_id=$post_id&page=$page&action=$action&included=$type";
			}
		}
	}
	
	public function getPostParam($column, $post_id){
		$db 	= new Db;
		
		$query 	= "SELECT `$column` FROM dnt_posts WHERE id = '$post_id' AND vendor_id = '".Vendor::getId()."'";
		if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
			   return $row[$column];
		   }
		 }else{
			 return false;
		 }
		 
	}
	
	public function showOrder(){
		return (AdminContent::getPage("current")*AdminContent::limit())-AdminContent::limit() + 1;
	}
	
	/* tags */
	public function databseTagsString($tags){
		$tags = str_replace(", ", ",", $tags); 
		$tags = str_replace(" ,", ",", $tags); 
		$tags = str_replace(", ", ",", $tags); 
		$tags = str_replace(" ", "-", $tags); 
		return $tags;
	}


	public function showTags($data){
		return explode(",", $data);
	}

	public function showTagName($data){
		$data = str_replace("-", " ", $data); 
		return ucfirst($data);
	}
   
   	
}