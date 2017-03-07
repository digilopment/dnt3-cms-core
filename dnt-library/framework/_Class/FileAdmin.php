<?php
class FileAdmin{
		
	public function limit(){
		return 20;
	}
	
	protected function prepare_query($is_limit){
		$db = new Db();
		
		
		//default cat
		/*
		if(isset($_GET['included']) && $_GET['included'] == "article"){
			$typ = "AND cat_id = '".$_GET['filter']."'";
		}
		elseif(isset($_GET['included']) && $_GET['included'] == "sitemap-sub"){
			$typ = "AND cat_id = '".$_GET['filter']."'";
		}
		elseif(isset($_GET['included']) && $_GET['included'] == "sitemap"){
			$typ = "AND cat_id = '".$_GET['filter']."'";
		}
		
		elseif(isset($_GET['filter']))
			$typ = "AND sub_cat_id = '".$_GET['filter']."'";
			*/
		if(isset($_GET['search'])){
			$typ = "AND `name` LIKE '%".Dnt::name_url($_GET['search'])."%'";
		}
		else{
			$typ = false;
		}
		
		if($is_limit == false)
			$limit = false;
		else
			$limit = $is_limit;
		
			$query = "SELECT * FROM `dnt_uploads` WHERE  `vendor_id` = '".Vendor::getId()."' ".$typ." ORDER BY `id` DESC ".$limit."";
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
			return WWW_PATH_ADMIN."index.php?src=files&filter=$cat_id&sub_cat_id=$sub_cat_id&type=$type";
		}else{
			if(isset($_GET['filter'])){
				return WWW_PATH_ADMIN."index.php?src=files&filter=$cat_id&sub_cat_id=$sub_cat_id&post_id=$post_id&page=$page&action=$action&type=$type";
			}else{
				return WWW_PATH_ADMIN."index.php?src=files&post_id=$post_id&page=$page&action=$action&type=$type";
			}
		}
	}
	
	public function getPostParam($column, $post_id){
		$db 	= new Db;
		
		$query 	= "SELECT `$column` FROM dnt_uploads WHERE id = '$post_id'";
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
	

   
   	
}