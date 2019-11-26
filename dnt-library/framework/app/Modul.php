<?php

/**
 *  class       Modul
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2019
 */
class Modul extends Database {

    public $name;
    public $init;
    public $sitemapUrl;

    protected function getSitemap($client) {
        $this->sitemapUrl = "";
        $query = "SELECT id_entity, name_url, type, name, service FROM `dnt_posts` 
            WHERE `dnt_posts`.`type` = 'sitemap' 
            AND `dnt_posts`.`show` > '0' 
            AND `dnt_posts`.`vendor_id` = '" . $client->id . "' 
            GROUP BY `dnt_posts`.`name_url`";

        if ($this->num_rows($query) > 0) {
            $this->sitemapUrl = $this->get_results($query, true);
        }
    }

    public function getSitemapModules($type = false) {

        if ($type == "static_view") {
            $eQ = '';
        } else {
            if ($type) {
                $eQ = $type;
            } else {
                $eQ = false;
            }
        }
        $arr = array();
        if ($this->sitemapUrl) {

            foreach ($this->sitemapUrl as $item) {
                if ($item->service == $eQ) {
                    $arr[] = $item->name_url;
                }
            }
        }

        return $arr;
    }

    protected function hasPattern($request, $pattern) {
        $request = explode("/", ltrim($request, "/"));
        $pattern = explode("/", ltrim($pattern, "/"));
        $returnString = false;

        $i = 0;
        $compareString = array();
        if (count($request) == count($pattern)) {
            //var_dump(count($request), count($pattern));
            foreach ($pattern as $singlPattern) {

                //strict
                if ($singlPattern == $request[$i]) {
                    $compareString[] .= $singlPattern;
                    $i++;
                }

                //digit
                if ($singlPattern == "{digit}" && is_numeric($request[$i])) {
                    $compareString[] .= $request[$i];
                    $i++;
                }

                //eny
                if ($singlPattern == "{eny}" && !empty($request[$i])) {
                    $compareString[] .= $request[$i];
                    $i++;
                }

                //alphabet
                if ($singlPattern == "{alphabet}" && ctype_alpha(str_replace("-", "", $request[$i]))) {
                    $compareString[] .= $request[$i];
                    $i++;
                }
            }

            if ($i == count($request)) {
                $returnString = "/" . join("/", $compareString);
            }
        }
        return $returnString;
    }

    protected function get($client) {
        $module = "";
        $file = "dnt-view/layouts/" . $client->layout . "/conf.php";
        if (file_exists($file)) {
            include_once $file;
            if (function_exists("custom_modules")) {
                $custom_modules = custom_modules($this);
            } else {
                $custom_modules = array();
            }
        } else {
            $custom_modules = array();
        }

        foreach (array_keys($custom_modules) as $index) {
            foreach ($custom_modules[$index] as $key => $modulUrl) {
                if ($this->hasPattern($client->requestNoLang, "/" . $modulUrl) == $client->requestNoLang) {
                    $module = $index;
                    break;
                }

                if ("/" . $modulUrl == $client->requestNoParam) {
                    $module = $index;
                    break;
                }

                if ($modulUrl == $client->route(1)) {
                    $module = $index;
                    break;
                }
            }
        }

        if ($client->route(1) == "") {
            $default = $client->getSetting("startovaci_modul"); //Settings::get("startovaci_modul");
            $moduleUrl = $this->getSitemapModules($default);
            if ($default && isset($moduleUrl[0])) {
                if ($client->urlLang()) {
                    $redirect = $client->wwwPath . $client->lang . "/" . $moduleUrl[0];
                } else {
                    $redirect = $client->wwwPath . $moduleUrl[0];
                }
                Dnt::redirect($redirect);
                exit;
            } else {
                $module = DEAFULT_MODUL;
            }
        }

        $this->name = $module;
        $this->init = true;
    }

    public function ModuleControllerToModuleName($path) {
        return ltrim(join('_', explode(' ', strtolower(preg_replace("([A-Z])", " $0", str_replace('ModuleController', '', pathinfo($path, PATHINFO_FILENAME)))))), '_');
    }

    public function loadVendorModul($module) {
        $layout = Vendor::getLayout();
        $controller = "dnt-view/layouts/" . $layout . "/modules/" . $module . "/" . (new Autoloader())->className($module) . "Controller.php";
        $function = "dnt-view/layouts/" . $layout . "/modules/" . $module . "/functions.php";
        $webhook = "dnt-view/layouts/" . $layout . "/modules/" . $module . "/webhook.php";
        
        if (file_exists($controller)) {
            include $controller;
            $clsName = (new Autoloader())->className($module) . "Controller";
            $moduleClass = new $clsName();
            $moduleClass->run();
        } else {
            if (file_exists($function)) {
                include $function;
            }
            if (file_exists($webhook)) {
                include $webhook;
            }
        }
        exit; //performance optimalization
    }

    public function load($client, $module) {
        $layout = $client->layout;
        $globalController = "dnt-modules/" . $module . "/" . (new Autoloader())->className($module) . "ModuleController.php";

        if (file_exists($globalController)) {
            include $globalController;
            $clsName = (new Autoloader())->className($module) . "ModuleController";
            $moduleClass = new $clsName();
            $moduleClass->run();
        } else {
            $this->loadVendorModul($module);
        }
    }

    public function init($client) {
        if (!$this->init) {
            $this->getSitemap($client);
            $this->get($client);
            $this->init = true;
        }
    }

}
