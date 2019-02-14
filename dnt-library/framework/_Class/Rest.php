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
        $addr1 = explode($get . "=", WWW_FULL_PATH);

        if (isset($addr1[1])) {
            $addr = $addr1[1];
            if (isset($addr1[1])) {
                if (explode("&", @$addr1[1]) == true) {

                    if (isset($addr1[1])) {
                        @$addr2 = explode("&", @$addr1[1]);
                        $this->get = @$addr2[0];
                    }
                } else {
                    $this->get = $addr;
                }
            }
        }
        return $this->get;
    }

    /**
     * 
     * domain redirector 
     * @param type $stillRedirect
     */
    public function redirectToDomain($stillRedirect = false) {

        if ($stillRedirect == true) {
            if ($GLOBALS['DB_DOMAIN']) {
                if ($GLOBALS['ORIGIN_PROTOCOL'] != $GLOBALS['DB_PROTOCOL']) {


                    $db_domain = $GLOBALS['DB_DOMAIN'];
                    $origin_domain = $GLOBALS['ORIGIN_PROTOCOL'] . $GLOBALS['ORIGIN_DOMAIN'];
                    $request = explode($origin_domain, WWW_FULL_PATH);



                    if (isset($request[1])) {
                        $request = $request[1];
                    } else {
                        $request = false;
                    }
                    $return = $GLOBALS['DB_PROTOCOL'] . $db_domain . $request;
                    Dnt::redirect($return);
                    exit;
                }
            }
        } else {
            $DB_DOMAIN_ONLY = explode("/", $GLOBALS['DB_DOMAIN']);
            $DB_DOMAIN_ONLY = $DB_DOMAIN_ONLY[0];

            $ORIGIN_DOMAIN_ONLY = explode("/", $GLOBALS['ORIGIN_DOMAIN']);
            $ORIGIN_DOMAIN_ONLY = $ORIGIN_DOMAIN_ONLY[0];

            if (($GLOBALS['ORIGIN_PROTOCOL'] != $GLOBALS['DB_PROTOCOL']) &&
                    (($GLOBALS['ORIGIN_DOMAIN'] == $GLOBALS['DB_DOMAIN']) || Dnt::in_string($ORIGIN_DOMAIN_ONLY, $DB_DOMAIN_ONLY))
            ) {
                $db_domain = $GLOBALS['DB_DOMAIN'];
                $origin_domain = $GLOBALS['ORIGIN_PROTOCOL'] . $GLOBALS['ORIGIN_DOMAIN'];
                $request = explode($origin_domain, WWW_FULL_PATH);
                if (isset($request[1])) {
                    $request = $request[1];
                } else {
                    $request = false;
                }
                $return = $GLOBALS['DB_PROTOCOL'] . $db_domain . $request;
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
        if (MULTY_LANGUAGE) {
            $defLang = DEAFULT_LANG;
            $langArray = array("sk", "cz", "pl", "en", "de", "at", "nl", "dk");
        } else {
            $defLang = "0";
            if ($thisArg == 1) {
                $langArray = MultyLanguage::activeVendorLangs();
            } else {
                $langArray = array("sk", "cz", "pl", "en", "de", "at", "nl", "dk");
            }
        }
        if (isset($_GET[SRC])) {
            $arr = array();
            $src = $_GET[SRC];
            $arr = explode("/", $src);
            if (is_array($langArray)) {
                if (in_array($arr[0], $langArray)) {
                    if (isset($arr[$thisArg])) {
                        return $arr[$thisArg];
                    } else {
                        return false;
                    }
                } else {
                    $arr = explode("/", $defLang . "/" . $src);
                    if (isset($arr[$thisArg])) {
                        return $arr[$thisArg];
                    } else {
                        return false;
                    }
                }
            }
        } else {
            /* if ($thisArg == 0) {
              return DEAFULT_LANG;
              }
              if ($thisArg == 0) {
              return DEAFULT_MODUL;
              } */
            if ($thisArg == 0) {
                return false;
            }
        }
    }

    public static function getModulUrl($module) {
        $webhook = new Webhook();
        $url = $webhook->getSitemapModules($module);
        return $url[0];
    }

    /**
     * 
     * @return type
     */
    public function getModul() {
        if ($GLOBALS['GET_MODUL']) {
            return $GLOBALS['GET_MODUL'];
        }
        $return = false;
        $file = "dnt-view/layouts/" . Vendor::getLayout() . "/conf.php";
        if (file_exists($file)) {
            include_once $file;
            if (function_exists("custom_modules")) {
                $custom_modules = custom_modules();
            } else {
                $custom_modules = false;
            }
        } else {
            $custom_modules = false;
        }
        $webhook = new Webhook;
        $this->webhook = $webhook->get($custom_modules);
        foreach (array_keys($this->webhook) as $this->index) {
            foreach ($this->webhook[$this->index] as $this->key => $this->value) {
                if ($this->webhook(2) == "detail") {
                    $return = "article_view";
                }
                if ($this->webhook(1) == "") {
                    $default = Settings::get("startovaci_modul");
                    if ($default) {
                        $redirect = $webhook->getSitemapModules($default);
                        $domain = $GLOBALS['ORIGIN_DOMAIN_LNG'] . "/";
                        //var_dump($domain.$redirect[0]);
                        //exit;
                        Dnt::redirect($domain . $redirect[0]);
                        exit;
                        $return = $default;
                    } else {
                        $return = DEAFULT_MODUL;
                    }
                }
                if ($this->value == $this->webhook(1)) {
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

        $layout = Vendor::getLayout();
        $function = "dnt-view/layouts/" . $layout . "/modules/" . $module . "/functions.php";
        $webhookModule = "dnt-modules/" . $module . "/webhook.php";
        $template = "dnt-view/layouts/" . $layout . "/modules/" . $module . "/webhook.php";

        if (file_exists($function))
            include $function;
        if (file_exists($webhookModule)) {
            include $webhookModule;
        } elseif (file_exists($template)) {
            include $webhookModule;
        }
    }

    /**
     * 
     */
    public function loadDefault() {
        $layout = Vendor::getLayout();
        if ($layout) {
            include "dnt-view/layouts/" . Vendor::getLayout() . "/modules/default/webhook.php";
        } else {
            include "dnt-view/layouts/default/modules/default/webhook.php";
        }
    }

    /**
     * 
     * @param type $module
     */
    public function loadMyModul($module) {
        $layout = Vendor::getLayout();
        $function = "dnt-view/layouts/" . $layout . "/modules/" . $module . "/functions.php";
        $template = "dnt-view/layouts/" . $layout . "/modules/" . $module . "/webhook.php";
        $webhookModule = "dnt-modules/" . $module . "/webhook.php";
        if (file_exists($function))
            include $function;
        if (file_exists($webhookModule)) {
            include $webhookModule;
        } elseif (file_exists($template)) {
            include $template;
        }
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
