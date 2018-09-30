<?php
/**
 *  class       ArticleList
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class ArticleList extends AdminContent {
    
    /**
     * 
     * @param type $is_limit
     * @return string
     */
    protected function prepare_query($is_limit, $postId = false, $servicesIDsStatic = false){
		
		$servicesIDs = Frontend::get();
		//var_dump($servicesIDs['article']['service_id']);
		//var_dump("test");
		$db = new Db();
		$rest = new Rest();
		
		$servicesIDs = $servicesIDs['article']['service_id'];
		$servicesIDs = str_replace(",", "', '", $servicesIDs);
		if($servicesIDsStatic){
			$servicesIDs = $servicesIDsStatic;
		}
		
		if(isset($_GET['search'])){
			$typ = "AND `name_url` LIKE '%".Dnt::name_url($_GET['search'])."%'";
		}elseif($rest->get("q")){
			$typ = "AND `dnt_posts`.`name_url` LIKE '%".Dnt::name_url(urldecode($rest->get("q")))."%'";
		}else{
			$typ = "AND `dnt_post_type`.`id_entity` IN('".$servicesIDs."')";
		}
		
		if($is_limit == false)
			$limit = false;
		else
			$limit = $is_limit;
		
		//AUTOREDIRECT URL
		if($postId == false)
			$typArticle = false;
		else{
			$typArticle = " AND `dnt_posts`.`id_entity` IN('".$postId."') ";
			$typ = false;
		}
		
			$query = "
			SELECT 
				`dnt_posts`.`id_entity` AS id, 
				`dnt_posts`.`vendor_id` AS vendor_id , 
				`dnt_posts`.`type` AS type, 
				`dnt_posts`.`name_url` AS name_url,
				`dnt_posts`.`name` AS name,
				`dnt_posts`.`content` AS content,
				`dnt_posts`.`perex` AS perex,
				`dnt_post_type`.`cat_id` AS cat_id,
				`dnt_post_type`.`name_url` AS cat_name_url,
				`dnt_post_type`.`id_entity` AS dnt_post_type_id
			FROM 
				`dnt_posts` 
			LEFT JOIN 
				`dnt_post_type` 
			ON 
				`dnt_posts`.`cat_id` = `dnt_post_type`.`id_entity` 
			WHERE 
				`dnt_posts`.`vendor_id` 	= '".Vendor::getId()."' 
			AND
				`dnt_posts`.`show` 			= '1'
			".$typArticle." 
			".$typ." 
			GROUP BY 
				`dnt_posts`.`id_entity`
			ORDER BY 
				`dnt_posts`.`order` DESC ".$limit."";
			//var_export( $query);
			return $query;
   	}

    /**
     * 
     * @return type
     */
    public function query($postId = false, $servicesIDsStatic = false) {
        $db = new Db;

        if (isset($_GET['page'])) {
            $returnPage = "&page=" . $_GET['page'];
        } else {
            $returnPage = false;
        }
		
		if($postId){
			 $query = self::prepare_query(false, $postId, $servicesIDsStatic);
			 return $query;
		}

        $query = self::prepare_query(false, $postId, $servicesIDsStatic);
        $pocet = $db->num_rows($query);
        $limit = self::limit();

        if (isset($_GET['page']))
            $strana = $_GET['page'];
        else
            $strana = 1;

        $stranok = $pocet / $limit;
        $pociatok = ($strana * $limit) - $limit;

        $prev_page = $strana - 1;
        $next_page = $strana + 1;
        $stranok_round = ceil($stranok);

        $pager = "LIMIT " . $pociatok . ", " . $limit . "";
        return self::prepare_query($pager, $postId, $servicesIDsStatic);
    }
	
	/** AUTOREDIRECT QUERY **/
	public function getArticleUrl($postId){
		
		$db = new Db;
		$articleView = new ArticleView;

		$query = self::query($postId);
		if($db->num_rows($query)>0){
			foreach($db->get_results($query) as $row){
				$url = $articleView->detailUrl($row['cat_name_url'], $row['id'], $row['name_url']);
			}
		}else{
			$url = false;
		}
		return $url;
	} 
	
	public function data($postId, $servicesIDsStatic){
		$db = new Db;
		$query = self::query($postId, $servicesIDsStatic);
		if($db->num_rows($query)>0){
			return $db->get_results($query);
		}else{
			return array();
		}
	}
    
    /**
     * 
     * @param type $id
     * @return type
     */
    /*public function getArticleUrl($id) {
        return Url::get("WWW_PATH") . "clanok/" . $id . "/" . $this->getTranslate(array("type" => "name_url", "translate_id" => $id, "table" => "dnt_posts"));
    }
	*/

}
