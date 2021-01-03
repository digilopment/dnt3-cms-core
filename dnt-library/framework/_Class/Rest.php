<?php

/**
 *  class       Rest
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntView\Layout\Configurator;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Webhook;
use DntLibrary\Base\Settings;
use function custom_modules;

class Rest
{

    public function __construct()
    {
        $this->dnt = new Dnt();
        $this->webhook = new Webhook();
        $this->settings = new Settings();
    }

    /**
     * 
     * @param type $get
     * @return type
     * this method creat a GET method of `default` and `rewrited` addr
     */
    public function get($get)
    {
        $return = false;
        if (isset($_GET[SRC]) && $get == SRC) {
            $return = $_GET[SRC];
        } else {
            $addr1 = explode($get . "=", WWW_FULL_PATH);
            if (isset($addr1[1])) {
                $addr = $addr1[1];
                if (isset($addr1[1])) {
                    if (explode("&", @$addr1[1]) == true) {
                        if (isset($addr1[1])) {
                            @$addr2 = explode("&", @$addr1[1]);
                            $return = @$addr2[0];
                        }
                    } else {
                        $return = $addr;
                    }
                }
            }
        }
        return $return;
    }

    /**
     * 
     * domain redirector 
     * @param type $stillRedirect
     */
    public function redirectToDomain($stillRedirect = 0)
    {

        if ($stillRedirect == 0) {
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
                    $this->dnt->redirect($return);
                    exit;
                }
            }
        } else {
            $DB_DOMAIN_ONLY = explode("/", $GLOBALS['DB_DOMAIN']);
            $DB_DOMAIN_ONLY = $DB_DOMAIN_ONLY[0];

            $ORIGIN_DOMAIN_ONLY = explode("/", $GLOBALS['ORIGIN_DOMAIN']);
            $ORIGIN_DOMAIN_ONLY = $ORIGIN_DOMAIN_ONLY[0];

            if (($GLOBALS['ORIGIN_PROTOCOL'] != $GLOBALS['DB_PROTOCOL']) &&
                    (($GLOBALS['ORIGIN_DOMAIN'] == $GLOBALS['DB_DOMAIN']) || $this->dnt->in_string($ORIGIN_DOMAIN_ONLY, $DB_DOMAIN_ONLY))
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
                $this->dnt->redirect($return);
                exit;
            } elseif ($this->dnt->in_string("www.", $DB_DOMAIN_ONLY) && !$this->dnt->in_string("www.", WWW_FULL_PATH)) {
                $db_domain = $GLOBALS['DB_DOMAIN'];
                $origin_domain = $GLOBALS['ORIGIN_PROTOCOL'] . $GLOBALS['ORIGIN_DOMAIN'];
                $request = explode($origin_domain, WWW_FULL_PATH);
                if (isset($request[1])) {
                    $request = $request[1];
                } else {
                    $request = false;
                }
                $return = $GLOBALS['DB_PROTOCOL'] . $db_domain . $request;
                $this->dnt->redirect($return);
                exit;
            }
        }
    }

    /**
     * 
     * @param type $thisArg
     * @return boolean
     */
    public function webhook($thisArg = false)
    {
        if ($thisArg === false) {
            return $GLOBALS['WEBHOOKS'];
        } else {
            if (isset($GLOBALS['WEBHOOKS'][$thisArg])) {
                return $GLOBALS['WEBHOOKS'][$thisArg];
            } else {
                return false;
            }
        }
        $this->globals;
    }

    public function getModulUrl($module)
    {
        $url = $this->webhook->getSitemapModules($module);
        return $url[0];
    }

    /**
     * 
     * @return type
     */
    protected function oldModulesRegistrator()
    {
        $file = "dnt-view/layouts/" . $this->vendor->getLayout() . "/conf.php";
        if (file_exists($file)) {
            include_once $file;
            if (function_exists("custom_modules")) {
                $custom_modules = custom_modules();
            } else {
                $custom_modules = array();
            }
        } else {
            $custom_modules = array();
        }
        return $custom_modules;
    }

    public function getModul()
    {
        if ($GLOBALS['GET_MODUL']) {
            return $GLOBALS['GET_MODUL'];
        }
        $return = false;
        $file = "dnt-view/layouts/" . $this->vendor->getLayout() . "/Configurator.php";
        if (file_exists($file)) {
            include $file;
            $configurator = new Configurator();
            if (method_exists($configurator, 'modulesRegistrator')) {
                $modulesRegistrator = $configurator->modulesRegistrator();
            } else {
                $modulesRegistrator = array();
            }
        } else {
            $modulesRegistrator = $this->oldModulesRegistrator();
        }

        $webhook = $this->webhook->get($modulesRegistrator);
        foreach (array_keys($webhook) as $index) {
            foreach ($webhook[$index] as $this->key => $value) {
                if ($webhook(2) == "detail") { //detail only as article_view 
                    $return = "article_view";
                    /* if ($this->value == $this->webhook(1)) {
                      $return = $this->index;
                      return $return;
                      }else{
                      $return = "article_view";
                      } */
                } elseif ($webhook(1) == "embed" && $webhook(2) == "video") {
                    return "video_embed";
                    exit;
                } elseif ($webhook(2) == "video") {
                    $return = "video_view";
                } else {
                    if ($webhook(1) == "") {
                        $default = $this->settings->get("startovaci_modul");
                        if ($default) {
                            $redirect = $this->webhook->getSitemapModules($default);
                            $domain = $GLOBALS['ORIGIN_DOMAIN_LNG'] . "/";
                            $this->dnt->redirect($domain . $redirect[0]);
                            exit;
                            $return = $default;
                        } else {
                            $return = DEAFULT_MODUL;
                        }
                    }
                    if ($value == $webhook(1)) {
                        $return = $index;
                    }
                }
            }
        }
        $GLOBALS['GET_MODUL'] = $return;

        return $return;
    }

    /**
     * 
     */
    public function loadModul()
    {
        $module = $this->getModul();
        //$function = "dnt-modules/" . $module . "/functions.php";

        $layout = $this->vendor->getLayout();
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
    public function loadDefault()
    {
        $layout = $this->vendor->getLayout();
        if ($layout) {
            include "dnt-view/layouts/" . $this->vendor->getLayout() . "/modules/default/webhook.php";
        } else {
            include "dnt-view/layouts/default/modules/default/webhook.php";
        }
    }

    /**
     * 
     * @param type $module
     */
    public function loadMyModul($module)
    {
        $layout = $this->vendor->getLayout();
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
    public function post($post)
    {
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
    public function setGet($arr)
    {
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
    public function escape($input)
    {
        $this->escape = mysql_real_escape_string($input);
        return $this->escape;
    }

    /**
     * 
     * @return boolean
     */
    public function isAdmin()
    {
        if ($this->dnt->in_string("dnt-admin", WWW_FULL_PATH)) {
            return true;
        } else {
            return false;
        }
    }

}
