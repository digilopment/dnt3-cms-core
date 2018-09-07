<?php
/**
 *  class       ArticleView
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
class ArticleView extends AdminContent {
    
    /**
     * 
     * @param type $post_type
     * @return type
     */
    public function getPosts($post_type) {
        //$post_type = "personal";
        $db = new Db;
        $query = "SELECT * FROM dnt_posts WHERE 
            `type`      = 'post' AND 
            `show`      = '1' AND 
            `cat_id`    = '" . self::getCatId($post_type) . "' AND 
            `vendor_id` = '" . Vendor::getId() . "'";

        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
        } else {
            return array(false);
        }
    }
	
	
	/**
     * 
     * @param type $post_type
     * @return type
     */
    public function getPostsMeta($postId, $m_service) {
        //$post_type = "personal";
        $db = new Db;
        $query = "SELECT * FROM dnt_posts_meta WHERE 
            `id_entity` = '".$postId."' AND 
            `service` = '$m_service' AND 
            `vendor_id` = '" . Vendor::getId() . "'";

        if ($db->num_rows($query) > 0) {
			return $db->get_results($query);
        } else {
            return false;
        }
    }
	
	/**
     * 
     * @param type $post_type
     * @return type
     */
    public function getPostMeta($postId, $key) {
        //$post_type = "personal";
        $db = new Db;
        $query = "SELECT * FROM dnt_posts_meta WHERE 
            `id_entity` = '".$postId."' AND 
            `vendor_id` = '" . Vendor::getId() . "'";

        if ($db->num_rows($query) > 0) {
             foreach ($db->get_results($query) as $row) {
                return $row[$key];
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * @return type
     */
    public function getSitemap() {
        //$post_type = "personal";
        $db = new Db;
        $query = "SELECT * FROM dnt_posts WHERE 
            `type`      = 'sitemap' AND 
            `cat_id`    = '" . AdminContent::getCatId("sitemap") . "' AND 
            `show`      = '1'";

        if ($db->num_rows($query) > 0) {
            return $db->get_results($query);
        } else {
            return array(false);
        }
    }
    
    /**
     * 
     * @param type $column
     * @param type $name_url
     * @return boolean
     */
    public function StaticViewParam($column, $name_url) {
        $rest = new Rest;
        $db = new Db;
        $query = "SELECT `$column` FROM dnt_posts WHERE `name_url` = '$name_url' AND vendor_id = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                return $row[$column];
            }
        } else {
            $query = "SELECT `translate_id` FROM dnt_translates WHERE `type` = 'name_url' AND translate = '" . $name_url . "' AND vendor_id = '" . Vendor::getId() . "'";
            if ($db->num_rows($query) > 0) {
                foreach ($db->get_results($query) as $row) {
                    return $row['translate_id'];
                }
            } else {
                return false;
            }
        }
    }
    
    /**
     * 
     * @return type
     */
    public function getStaticId() {
        $rest = new Rest;
        return $this->StaticViewParam("id", $rest->webhook(1));
    }
    
    /**
     * 
     * @return type
     */
    public function getArticleId() {
        $rest = new Rest;
        return $rest->webhook(2);
    }

    /**
     * 
     * @param type $post_id
     * @return type
     * returns array of tags
     */
    public function getPostTags($post_id) {
        $arr = array();
        if (count($this->showTags($this->getPostParam("tags", $post_id))) > 0) {
            foreach ($this->showTags($this->getPostParam("tags", $post_id)) as $tag) {
                $arr[] = $tag;
            }
            return $arr;
        } else {
            return $arr;
        }
    }
    
    /**
     * 
     * @param type $column
     * @param type $post_id
     * @param type $full_url
     * @param type $default
     * @return boolean
     */
    public function getPostParam($column, $post_id, $full_url = false, $default = false){
		
		//return "aaa";
		$db 	= new Db;
		$lang 	= new MultyLanguage;
		
		//$Q_column = "l_translate";
		
		if(DEAFULT_LANG == $lang->getLang()){
			$Q_column = $column;
			$query = "
				SELECT 
					*
				FROM `dnt_posts` 
				WHERE `dnt_posts`.id = '".$post_id."' 
				AND `dnt_posts`.vendor_id 	= '".Vendor::getId()."'
			";
		}else{
			if(
				$column == "name" || 
				$column == "name_url" || 
				$column == "content" || 
				$column == "perex" 
			){
				$Q_column = "l_translate";
				$query = "
					SELECT 
						`dnt_posts`.`id` AS c_id, 
						`dnt_posts`.`vendor_id` AS c_vendor_id , 
						`dnt_posts`.`type` AS c_type, 
						`dnt_posts`.`name_url` AS c_name_url,
						`dnt_posts`.`name` AS c_name,
						`dnt_posts`.`content` AS c_content,
						`dnt_posts`.`perex` AS c_perex,

						`dnt_translates`.`type` AS l_type,
						`dnt_translates`.`translate` AS l_translate
						
					FROM `dnt_posts` 
					LEFT JOIN `dnt_translates` 
					ON `dnt_posts`.`id` = `dnt_translates`.`translate_id` 
					WHERE `dnt_posts`.id = '".$post_id."' 
					AND `dnt_translates`.`lang_id` 	= '".$lang->getLang()."' 
					AND `dnt_translates`.`type` 	= '".$column."' 
					AND `dnt_posts`.vendor_id 	= '".Vendor::getId()."'
				";
			}else{
				$Q_column = $column;
				$query = "
				SELECT 
					*
				FROM `dnt_posts` 
				WHERE `dnt_posts`.id = '".$post_id."' 
				AND `dnt_posts`.vendor_id 	= '".Vendor::getId()."'";
				
			}
		}
		
		/*
		if($column != "name" || "name_url" || "perex" || "content"){
			$Q_column = $column;
			$query = "
				SELECT 
					*
				FROM `dnt_posts` 
				WHERE `dnt_posts`.id = '".$post_id."' 
				AND `dnt_posts`.vendor_id 	= '".Vendor::getId()."'
			";
		}
		*/
	
		
		if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
			   
				if($column == "name_url"){
					if(Dnt::is_external_url($row[$Q_column])){
						 return $row[$Q_column];
					}elseif($full_url == false && $column == "name_url"){
						return  Url::get("WWW_PATH").$row[$Q_column];
					}else{
						return  Url::get("WWW_PATH").$row[$Q_column];
					}
			   }else{
				   return $row[$Q_column];
			   }
			   
		   }
		 }else{
			return false; 
		 }

		
		/* STARE RIESENIE  		
		//return "aaa";
		$db 	= new Db;
		$query 	= "SELECT `$column` FROM dnt_posts WHERE id = '$post_id' AND vendor_id = '".Vendor::getId()."'";
		
		if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
			   //return $row[$column];
			   
			   if(Dnt::is_external_url($this->getTranslate(array("type" => $column, "translate_id" => $post_id, "table" => "dnt_posts")))){
				   return $this->getTranslate(array(
					"type" => $column, 
					"translate_id" => $post_id, 
					"table" => "dnt_posts",
					"default" => $default,
					));
			   }
			   elseif($full_url == false && $column == "name_url"){
				   return $this->getTranslate(array("type" => $column, "translate_id" => $post_id, "table" => "dnt_posts"));
			   }else{
				   if($column == "name_url"){
					   return  Url::get("WWW_PATH").$this->getTranslate(array(
						"type" => $column, 
						"translate_id" => $post_id, 
						"table" => "dnt_posts",
						"default" => $default,
						));
				   }else{
					   return $this->getTranslate(array(
						"type" => $column, 
						"translate_id" => $post_id, 
						"table" => "dnt_posts",
						"default" => $default,
						));
				   }
			   }
		   }
		 }else{
			 return false;
		 }
		 
		 */
	}
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function getPostImage($id) {
        $image = new Image;
        return $image->getPostImage($id);
    }

}
