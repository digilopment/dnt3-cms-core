<?php
class ArticleView extends AdminContent{
	
	public function StaticViewParam($column, $name_url){
		$rest = new Rest;
		$db = new Db;
		$query 	= "SELECT `$column` FROM dnt_posts WHERE `name_url` = '$name_url' AND vendor_id = '".Vendor::getId()."'";
		if($db->num_rows($query)>0){
			foreach($db->get_results($query) as $row){
				return $row[$column];
			}
		}else{
			return false;
		}
	}
	
	public function getStaticId(){
		$rest = new Rest;
		return $this->StaticViewParam("id", $rest->webhook(1));
	}
	
	public function getArticleId(){
		$rest = new Rest;
		return $rest->webhook(2);
	}
	
	/*
	 * returns array of tags
	 *
	*/
	public function getPostTags($post_id){
		$arr = array();
		if(count($this->showTags($this->getPostParam("tags", $post_id))) > 0){
			foreach ($this->showTags($this->getPostParam("tags", $post_id)) as $tag){
				$arr[] = $tag;
			}
			return $arr;
		}else{
			return $arr;
		}
	}
	
	public function getPostParam($column, $post_id){
		$db 	= new Db;
		
		$query 	= "SELECT `$column` FROM dnt_posts WHERE id = '$post_id' AND vendor_id = '".Vendor::getId()."'";
		if($db->num_rows($query)>0){
		   foreach($db->get_results($query) as $row){
			   //return $row[$column];
			   return $this->getTranslate(array("type" => $column, "translate_id" => $post_id, "table" => "dnt_posts"));
		   }
		 }else{
			 return false;
		 }
		 
	}
	
	
	
	public function getPostImage($id){
		$image = new Image;
		return $image->getPostImage($id);
	}
	
	
}