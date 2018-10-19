<?php
/**
 *  class       Rest
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

class Rest {

    var $get; //variable of get result
    var $post; //variable of get post
    var $escape; //variable of get escape
    
    /**
     * 
     * @param type $get
     * @return type
     * this method creat a GET method of `default` and `rewrited` addr
     */
    public function get($get) {
        @$addr1 = explode($get . "=", WWW_FULL_PATH);
        @$addr = $addr1[1];

        if (explode("&", @$addr1[1]) == true) {
            @$addr2 = explode("&", $addr1[1]);
            $this->get = $addr2[0];
        } else {
            $this->get = $addr;
        }
        return $this->get;
    }
	
	
	/** domain redirector **/
	public function redirectToDomain($stillRedirect = false){
		if($stillRedirect == true ){
			if($GLOBALS['DB_PROTOCOL']){
				if(($GLOBALS['ORIGIN_DOMAIN'] != $GLOBALS['DB_DOMAIN']) || ($GLOBALS['ORIGIN_PROTOCOL'] != $GLOBALS['DB_PROTOCOL'])){
					$db_domain = $GLOBALS['DB_PROTOCOL'].$GLOBALS['DB_DOMAIN'];
					$origin_domain = $GLOBALS['ORIGIN_PROTOCOL'].$GLOBALS['ORIGIN_DOMAIN'];
					$request = explode($origin_domain, WWW_FULL_PATH);
					$request = $request[1];
					$return = $db_domain.$request;
					Dnt::redirect($return);
					exit;
				}	
			}
		}else{
			if(($GLOBALS['ORIGIN_DOMAIN'] == $GLOBALS['DB_DOMAIN']) && ($GLOBALS['ORIGIN_PROTOCOL'] != $GLOBALS['DB_PROTOCOL'])){
				$db_domain = $GLOBALS['DB_PROTOCOL'].$GLOBALS['DB_DOMAIN'];
				$origin_domain = $GLOBALS['ORIGIN_PROTOCOL'].$GLOBALS['ORIGIN_DOMAIN'];
				$request = explode($origin_domain, WWW_FULL_PATH);
				$request = $request[1];
				$return = $db_domain.$request;
				Dnt::redirect($return);
				exit;
			}
		}
	}


    /**
     * 
     * @param type $thisArg
     * @return boolean
     */
    public function webhook($thisArg) {
        if (isset($_GET[SRC])) {
            $arr = array();
            $src = $_GET[SRC];
            $arr = explode("/", $src);
            if ($arr[0] == "sk" || $arr[0] == "en" || $arr[0] == "de" || $arr[0] == "cz") {
                if (isset($arr[$thisArg])) {
                    return $arr[$thisArg];
                } else {
                    return false;
                }
            } else {
                $arr = explode("/", "sk/" . $src);
                if (isset($arr[$thisArg])) {
                    return $arr[$thisArg];
                } else {
                    return false;
                }
            }
        } else {
            if ($thisArg == 0) {
                return DEAFULT_LANG;
            }
            if ($thisArg == 0) {
                return DEAFULT_MODUL;
            }
        }
    }

	
		
	public static function getModulUrl($module){
		$webhook = new Webhook();
		$url = $webhook->getSitemapModules($module);
		return WWW_PATH.$url[0];
	}
	
    /**
     * 
     * @return type
     */
	public function getModul(){
		if($GLOBALS['GET_MODUL']){
			return $GLOBALS['GET_MODUL'];
		}
		$return = false;
		$file = "dnt-view/layouts/".Vendor::getLayout()."/conf.php";
		if(file_exists($file)){
			include_once $file;
			if(function_exists("custom_modules")){
				$custom_modules = custom_modules();
			}else{
				$custom_modules = false;
			}
		}else{
			$custom_modules = false;
		}
		$webhook = new Webhook;
		$this->webhook = $webhook->get($custom_modules);
		foreach(array_keys($this->webhook) as $this->index){
			foreach($this->webhook[$this->index] as $this->key=>$this->value){
				//var_dump($this->value);
				if($this->webhook(2) == "detail"){
					$return = "article_view";
				}
				if($this->webhook(1) == ""){
					$default = Settings::get("startovaci_modul");
					if($default){
						$redirect = $webhook->getSitemapModules($default);
						Dnt::redirect($redirect[0]);
						exit;
						$return = $default;
					}else{
						$return = DEAFULT_MODUL;
					}
				}
				if($this->value == $this->webhook(1)){
					$return = $this->index;
				}
			}
		}
		$GLOBALS['GET_MODUL'] = $return;
		
		return $return;
	}

    /**
     * 
     */
    public function loadModul() {
			$module = $this->getModul();
            //$function = "dnt-modules/" . $module . "/functions.php";
            //$template = "dnt-modules/" . $module . "/webhook.php";
			
			$layout = Vendor::getLayout();
			$function = "dnt-view/layouts/" . $layout . "/modules/".$module."/functions.php";
			$template = "dnt-view/layouts/" . $layout . "/modules/".$module."/webhook.php";
            
			if (file_exists($function))
                include $function;
            if (file_exists($template))
                include $template;
    }

    /**
     * 
     */
    public function loadDefault() {
        include "dnt-view/layouts/" . Vendor::getLayout() . "/modules/default/webhook.php";
    }

    /**
     * 
     * @param type $module
     */
    public function loadMyModul($module) {
        //$function = "dnt-modules/" . $module . "/functions.php";
        //$template = "dnt-modules/" . $module . "/webhook.php";
		
		$layout = Vendor::getLayout();
		$function = "dnt-view/layouts/" . $layout . "/modules/".$module."/functions.php";
		$template = "dnt-view/layouts/" . $layout . "/modules/".$module."/webhook.php";
        if (file_exists($function))
            include $function;
        if (file_exists($template))
            include $template;
    }

    /**
     * 
     * @param type $post
     * @return type
     */
    public function post($post) {
        if (isset($_POST[$post])) {
            $this->post = @$_POST[$post];
        } else {
            $this->post = false;
        }

        return $this->post;
    }

    /**
     * 
     * @param type $arr
     * @return type
     */
    public function setGet($arr) {


        foreach ($arr as $key => $value) {
            /* $explodedArr = explode("?$key", WWW_FULL_PATH);
              if(count($explodedArr)>1){
              $get_s[] = "a=b";
              }elseif(count($explodedArr)>1){
              $get_s[] = "a=b";
              }else{
              $get_s[] = "$key=$value";
              } */
            $get_s[] = "$key=$value";
        }

        $params = implode("&", $get_s);
        return WWW_FULL_PATH . "&$params";
    }

    /**
     * 
     * @param type $input
     * @return type
     */
    public function escape($input) {
        $this->escape = mysql_real_escape_string($input);
        return $this->escape;
    }

    /**
     * 
     * @return boolean
     */
    public function isAdmin() {
        if (Dnt::in_string("dnt-admin", WWW_FULL_PATH)) {
            return true;
        } else {
            return false;
        }
    }

}
