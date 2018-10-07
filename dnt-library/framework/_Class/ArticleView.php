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
            return array();
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
            `post_id` = '".$postId."' AND 
            `service` = '".$m_service."' AND 
            `vendor_id` = '".Vendor::getId()."'";
		
        if ($db->num_rows($query) > 0) {
			return $db->get_results($query);
        } else {
            return false;
        }
    }
	
	/** 
		return data from instalation modul
	**/
	function defaultMetaToArray($postId, $moduleName, $dbKey = false){
		/*if( $dbKey){
			return 55;
		}*/
		$pattern = '/\s*/m';
		$replace = '';
		$data = defaultModulMetaDataInstalation($postId, $moduleName);
		//$data = trim($data);
		
		$data = preg_replace('/\t/', '', $data); //remove tabs
		$data = preg_replace('/\r/', '', $data); //remove tabs
		$data = preg_replace('/\n/', '', $data); //remove new line
		$data = preg_replace('/\s{3,}/',' ', $data);
		$data = preg_replace($pattern,$replace,$data);
		//$data = trim($data);
		
		$data = str_replace(");", ")", $data['sql']);
		$data = str_replace("(", "", $data);
		$data = str_replace("'", "", $data);
		$data = explode("),", $data);
		
		
		/*
				$data = preg_replace('/\t/', '', $data); //remove tabs
		$data = preg_replace('/\r/', '', $data); //remove tabs
		$data = preg_replace('/\n/', '', $data); //remove new line
		//$data = preg_replace($pattern,$replace,$data);
		$data = preg_replace('/\s\s+/', ' ', $data);
		//$data = trim($data);
		
		$data = str_replace(");", ")", $data['sql']);
		$data = str_replace("(null", "null", $data);
		$data = str_replace("''", "<TMP>/<TMP>", $data);
		$data = str_replace("'", "", $data);
		$data = str_replace("<TMP>/<TMP>", "0", $data);
		$data = explode("),", $data);
		*/
		
		foreach($data as $id => $item){
			foreach(explode(",",$item) as $id2 => $key){
				
				if($id2 == 0)
					$myKey = "id";
				elseif($id2 == 1)
					$myKey = "id_entity";
				elseif($id2 == 2)
					$myKey = "post_id";
				elseif($id2 == 3)
					$myKey = "service";
				elseif($id2 == 4)
					$myKey = "vendor_id";
				elseif($id2 == 5)
					$myKey = "key";
				elseif($id2 == 6)
					$myKey = "value";
				elseif($id2 == 7)
					$myKey = "content_type";
				elseif($id2 == 8)
					$myKey = "cat_id";
				elseif($id2 == 9)
					$myKey = "description";
				elseif($id2 == 10)
					$myKey = "show";
				
				/** IF SINGL LINE **/
				if($dbKey && $dbKey == $key){
					return $item;
					break;
				}
				
				if($id2 == 6 or $id2 == 9){
					$array[$id][$myKey] = $key;
				}else{
					$array[$id][$myKey] = preg_replace($pattern,$replace,str_replace(")", "", $key));
				}
			}
		}
		return $array;
	}
	
	
	
	/**
     * 
     * @param type $post_type
     * @return type
     */
	 /*
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
	*/

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
            return array();
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
        return $this->StaticViewParam("id_entity", $rest->webhook(1));
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
					$Q_column
				FROM `dnt_posts` 
				WHERE `dnt_posts`.id_entity = '".$post_id."' 
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
						`dnt_posts`.`id_entity` AS c_id_entity, 
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
					ON `dnt_posts`.`id_entity` = `dnt_translates`.`translate_id` 
					WHERE `dnt_posts`.id_entity = '".$post_id."' 
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
				WHERE `dnt_posts`.id_entity = '".$post_id."' 
				AND `dnt_posts`.vendor_id 	= '".Vendor::getId()."'";
				
			}
		}
		
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
	
	public function getMetaData($id_entity) {
		$db = new Db;
        $query = 
			"SELECT 
			`dnt_posts`.`id_entity` AS dnt_posts_id, 
			`dnt_posts`.`vendor_id` AS dnt_posts_vendor_id , 
			`dnt_posts`.`type` AS dnt_posts_type, 
			`dnt_posts`.`name_url` AS dnt_posts_name_url,
			`dnt_posts`.`name` AS dnt_posts_name,
			`dnt_posts`.`content` AS dnt_posts_content,
			`dnt_posts`.`perex` AS dnt_posts_perex,
			`dnt_posts`.`service` AS dnt_posts_service,
			
			`dnt_post_type`.`cat_id` AS dnt_post_type_cat_id,
			`dnt_post_type`.`name_url` AS dnt_post_type_name_url,
			`dnt_post_type`.`id_entity` AS dnt_post_type_id_entity,
			
			`dnt_posts_meta`.`key` AS dnt_posts_meta_key,
			`dnt_posts_meta`.`value` AS dnt_posts_meta_value,
			`dnt_posts_meta`.`show` AS dnt_posts_meta_show,
			`dnt_posts_meta`.`vendor_id` AS dnt_posts_meta_vendor_id
			
		FROM 
			`dnt_posts` 
		JOIN 
			`dnt_post_type` 
		ON 
			`dnt_posts`.`cat_id` = `dnt_post_type`.`id_entity` 
		JOIN
			`dnt_posts_meta`
		ON
			`dnt_posts`.`id_entity` = `dnt_posts_meta`.`post_id`  
		AND 
			`dnt_posts`.`service` =  `dnt_posts_meta`.`service`  
		WHERE 
			`dnt_posts`.`vendor_id` = '".Vendor::getId()."' 
		AND
			`dnt_posts_meta`.`vendor_id` = '".Vendor::getId()."'
		AND
			`dnt_posts`.`show` = '1'
		AND 
			`dnt_posts`.`id_entity` = '$id_entity'
		GROUP BY 
			`dnt_posts_meta`.`key`
		ORDER BY 
			`dnt_posts_meta`.`id_entity` ASC"; 
			
			
			
		if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
			   $arr['dnt_posts_id'] = $row['dnt_posts_id'];
			   $arr['dnt_posts_vendor_id'] = $row['dnt_posts_vendor_id'];
			   $arr['dnt_posts_type'] = $row['dnt_posts_type'];
			   $arr['dnt_posts_name_url'] = $row['dnt_posts_name_url'];
			   $arr['dnt_posts_name'] = $row['dnt_posts_name'];
			   $arr['dnt_posts_content'] = $row['dnt_posts_content'];
			   $arr['dnt_posts_perex'] = $row['dnt_posts_perex'];
			   $arr['dnt_posts_service'] = $row['dnt_posts_service'];
			   $arr['dnt_post_type_cat_id'] = $row['dnt_post_type_cat_id'];
			   $arr['dnt_post_type_name_url'] = $row['dnt_post_type_name_url'];
			   $arr['keys'][$row['dnt_posts_meta_key']]['show'] = $row['dnt_posts_meta_show'];
			   $arr['keys'][$row['dnt_posts_meta_key']]['value'] = $row['dnt_posts_meta_value'];			   
		   }
		   return $arr;
		}
		return array();
    }
	
	
	function detailUrl($cat_name_url, $id_entity, $name_url){
		$url = Url::get("WWW_PATH").$cat_name_url."/detail/".$id_entity."/".$name_url."";
		return $url;
	}

}
