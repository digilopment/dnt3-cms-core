<?php
class Url{
	
	
	
	public function getCss($file){
		$path = WWW_CDN_PATH."dnt-view/layouts/markiza/css/".$file;
		return '<link href="'.$path.'" media="screen, tv, projection" rel="stylesheet" type="text/css" />';
	}
	
	public function getJs($file){
		$path = WWW_CDN_PATH."dnt-view/layouts/markiza/js/".$file;
		return '<script src="'.$path.'" type="text/javascript"></script>';
	}
	
	public function get($url){
		if($url == "WWW_PATH"){
			$lang = MultyLanguage::getLang();
			if($lang == DEAFULT_LANG){
				$lg = false;
			}else{
				$lg = $lang;
			}
			$r = WWW_PATH."".$lg."/";
		}
		
		return $r;
	}
	
	/**** OLD */
    var $url;
    var $modul_name;
    var $modul_img;
	
    var $photo;
    var $photo_pripona;
    var $vendor;
	
    var $query;
    var $nazov;
    var $pripona;
	
    var $layoutId;
    var $layout;
	
	/*
	 * @get_img_version()
	 * returns version of image
	 * GET_IMAGE_VERSION return true, false
	*/
	protected function get_img_version(){
		return "?125";
	}
	
	protected function p_query($type, $postId, $column){
		$dntDb = new DB();
		
		if($type == false || "dnt_posts"){
			$this->query = "SELECT ".$column." FROM dnt_posts WHERE id = '".$postId."' LIMIT 1";
		}
		elseif($type == "obchod_produkty"){
			$this->query = "SELECT ".$column." FROM obchod_produkty  WHERE id = '".$postId."' LIMIT 1";
		}
		
		return $this->query;
	}
	
	protected function p_img_property($type, $postId, $column){
		$dntDb = new DB();
		$query = $this->p_query($type, $postId, $column);
		foreach($dntDb->get_results($query) as $row){
			return $this->vendor = $row[$column];
		}
	}
	
	/*
	 * @get_uploaded_image($postId)
	 * returns post image of post, product, user saved in data/vendor_id/$folder/
	*/
	public function get_post_image($type, $postId, $folder = "posts"){
		return WWW_CDN_PATH."".SYSTEM_NAME."/data/".$this->p_img_property($type, $postId, "vendor")."/".$folder."/".$this->p_img_property($type, $postId, "url_fotka").".".$this->p_img_property($type, $postId, "fotka_pripona").$this->get_img_version();
	}
	
	/*
	 * @get_uploaded_image($postId)
	 * returns uploaded image saved in data/vendor_id/uploads/
	*/
	public function get_uploaded_image($postId){
		
		$dntDb = new DB();
		$query = "SELECT vendor, nazov, pripona FROM dnt_uploads WHERE id = '".$postId."' LIMIT 1";
		foreach($dntDb->get_results($query) as $row){
			$this->vendor 	= $row['vendor'];
			$this->nazov 	= $row['nazov'];
			$this->pripona 	= $row['pripona'];
		}
		
		return WWW_CDN_PATH."".SYSTEM_NAME."/data/".$this->vendor."/uploads/".$this->nazov.".".$this->pripona.$this->get_img_version();
		
	}
	
	/*
	 * @get_static_image($img)
	 * returns static image saved in layouts/theme_name/images/
	*/
	public function get_static_image($img){
		
		//GET INSTANCE
		$dntDb = new DB();
		$dntSs = new Sessions();
	
	
		$vendorId = $dntSs->get_session_data("getVendorId");
		//SELECT LAYOUT ID
		$query = "SELECT layout FROM dnt_vendors WHERE id = '".$vendorId."' LIMIT 1";
		foreach($dntDb->get_results($query) as $row){
			$this->layoutId = $row['layout'];
		}
		
		//SELECT LAYOUT NAMR
		$query = "SELECT url FROM dnt_layouts WHERE id = '".$this->layoutId."' LIMIT 1";
		foreach($dntDb->get_results($query) as $row){
			$this->layout = $row['url'];
		}
		
		return WWW_CDN_PATH."".SYSTEM_NAME."/layouts/".$this->layout."/images/".$img.$this->get_img_version();
	}
	

	
}