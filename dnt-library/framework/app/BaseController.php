<?php

class BaseController {

    protected $suffix = "generated";

    protected function path() {
        return "dnt-view/layouts/" . Vendor::getLayout() . "/plugins/";
    }

    protected function cachedFile($plugin) {
        return "dnt-cache/plugins/" . $this->pluginCacheName($plugin);
    }

    protected function pluginKey($plugin, $key) {
        if (isset($plugin[$key])) {
            return $plugin[$key];
        }
        return false;
    }

    protected function getTemplateToString($plugin, $data) {
        ob_start();
        include $this->path() . $plugin['tpl'];
        $string = ob_get_clean();
        return $string;
    }

    protected function getCachedFileToString($plugin, $data) {
        ob_start();
        include $this->cachedFile($plugin);
        $string = ob_get_clean();
        return $string;
    }

    protected function createCacheFile($plugin, $html) {
        if (!is_dir("dnt-cache/plugins")) {
            mkdir("dnt-cache/plugins");
        }

        if ($this->pluginKey($plugin, 'compress') == 1) {
            $html = $this->minify($html);
        }

        file_put_contents($this->cachedFile($plugin), $html);
    }

    protected function pluginCacheName($plugin) {
        $file = str_replace("../", "", $plugin['tpl']);
        $file = explode(".", $file);
        $file = current($file);
        return md5($this->path() . $file) . "-" . str_replace("/", "-", $file) . "-" . $plugin['cache'] . ".generated";
    }

    protected function cacheToSeconds($plugin) {

        $index = strtoupper(substr($plugin['cache'], -1));
        switch ($index) {
            case "S":
                $multiplier = 1;
                break;
            case "M":
                $multiplier = 60;
                break;
            case "H":
                $multiplier = 3600;
                break;
            case "D":
                $multiplier = 86400;
                break;
            case "W":
                $multiplier = 86400 * 7;
                break;
            case "N":
                $multiplier = 86400 * 30;
                break;
            case "Y":
                $multiplier = 86400 * 365;
                break;
        }

        $value = preg_replace("/[^0-9]/", "", $plugin['cache']);
        return $value * $multiplier;
    }

    protected function inCacheRange($plugin) {
        if (time() - filemtime($this->cachedFile($plugin)) <= $this->cacheToSeconds($plugin)) {
            return true;
        } else {
            return false;
        }
    }

    protected function isCachedFile($plugin) {
        if (file_exists($this->cachedFile($plugin)) && $this->inCacheRange($plugin)) {
            return true;
        }
        return false;
    }

    public function bodyParser($conf, $data) {

        $tplFunctions = "dnt-view/layouts/" . Vendor::getLayout() . "/tpl_functions.php";
        if (file_exists($tplFunctions))
            include $tplFunctions;

        $output = [];
        foreach ($conf as $plugin) {
            
            if ($this->isCachedFile($plugin)) {
                $output[$plugin['layout']][] = $this->getCachedFileToString($plugin, $data);
            } else {
                $html = $this->getTemplateToString($plugin, $data);
                $this->createCacheFile($plugin, $html);
                $output[$plugin['layout']][] = $html;
            }
            if($plugin['layout'] == 'LAYOUT'){
                $pluginLayout = $plugin;
            }
        }
       
       $uniqLayout = [];
       foreach($conf as $uniqPlugin){
           if($uniqPlugin['layout'] == 'LAYOUT'){
                $uniqLayout[$uniqPlugin['layout']] = $pluginLayout;
           }else{
                $uniqLayout[$uniqPlugin['layout']] = 1;
           }
       }
       
       foreach($uniqLayout as $layoutKey => $plugin){
           if($layoutKey == 'LAYOUT'){
                $layout = $this->getTemplateToString($plugin, $data);
            }else{
                $layouts[] =    '<<!'.$layoutKey.'!>>';
                $templates[] =  join("", $output[$layoutKey]);
            }
       }
       
       $html = preg_replace($layouts, $templates, $layout);
       echo $html;
    }

    protected function minify($html) {

        $search = array(
            '/\>[^\S ]+/s', // strip whitespaces after tags, except space
            '/[^\S ]+\</s', // strip whitespaces before tags, except space
            '/(\s)+/s', // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        );
        $replace = array(
            '>',
            '<',
            '\\1',
            ''
        );
        $html = preg_replace($search, $replace, $html);
        return $html;
    }
    
    protected function modulConfigurator($data) {
        $confFile = "dnt-view/layouts/" . Vendor::getLayout() . "/modules/" . $data['article']['service'] . "/composer.conf";
        if (file_exists($confFile)) {
            $xml = simplexml_load_file("dnt-view/layouts/" . Vendor::getLayout() . "/modules/" . $data['article']['service'] . "/composer.conf");
            foreach ($xml as $plugin) {
                $name = (string) $plugin['name'];
                foreach ($plugin->VAR as $var) {
                    $conf[$name][(string) $var['id']] = (string) $var['value'];
                }
            }
            $this->bodyParser($conf, $data);
        } else {
            die("No config file found <b>" . $confFile . "</b>");
        }
    }

    protected function modulLoader($data, $file) {
        include "dnt-view/layouts/" . Vendor::getLayout() . "/modules/" . $data['article']['service'] . "/" . $file;
    }

}
