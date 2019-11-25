<?php

/**
 *  class       BaseControll
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2019
 */
class BaseController {

    protected $suffix = 'generated';
    protected $confFile = 'Plugins.shell';

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

        $controller = $plugin['tpl'] . '.php';
        $pathCompose = '';
        $pluginName = '';

        if (isset($plugin['type']) && $plugin['type'] == 'mdl') {
            $controller = $plugin['tpl'] . '/' . $plugin['tpl'] . 'PluginControll.php';
        }
        if (isset($plugin['level']) && $plugin['level'] == 'local') {
            $pathCompose = '../modules/' . $data['article']['service'] . '/plugins/';
        }



        if (isset($plugin['type']) && $plugin['type'] == 'mdl') {
            $clsName = (new Autoloader())->className($plugin['tpl']) . "PluginControll";
            if (!class_exists($clsName)) {
                include $this->path() . $pathCompose . $controller;
                $plugin = new $clsName($data, $plugin['id']);
                $plugin->run();
            } else {
                $plugin = new $clsName($data, $plugin['id']);
                $plugin->run();
            }
        } else {
            include $this->path() . $pathCompose . $controller;
        }

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

        $cacheId = false;
        if (isset($plugin['cache_id'])) {
            if (Dnt::in_string('GET{', $plugin['cache_id'])) {
                $val = str_replace('GET{', '', $plugin['cache_id']);
                $val = str_replace('}', '', $val);
                $cacheId = (!empty((new Rest())->get($val)) && $plugin['cache_id'] == 'GET{' . $val . '}') ? str_replace("/", "-", (new Rest())->get($val)) : false;
            }
        }
        return
                md5($this->path() . $file) . "-" .
                str_replace("/", "-", $file) . "-" .
                $plugin['level'] . "-" .
                $plugin['data']['post_id'] . "-" .
                $plugin['id'] . "-" .
                Vendor::getId() . "-" .
                $cacheId . "-" .
                $plugin['cache'] . ".generated";
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

    protected function isCachedFile($plugin, $allowCache) {
        if (file_exists($this->cachedFile($plugin)) && $this->inCacheRange($plugin) && $allowCache) {
            return true;
        }
        return false;
    }

    public function bodyParser($conf, $pluginKeys, $allowCache, $data) {

        $tplFunctions = "dnt-view/layouts/" . Vendor::getLayout() . "/tpl_functions.php";
        if (file_exists($tplFunctions)) {
            include $tplFunctions;
        }

        $output = [];
        foreach ($conf as $plugin) {

            $plugin["data"] = $data;

            if ($this->isCachedFile($plugin, $allowCache)) {
                $output[$plugin['layout']][] = $this->getCachedFileToString($plugin, $data);
            } else {
                $html = $this->getTemplateToString($plugin, $data);
                if ($allowCache) {
                    $this->createCacheFile($plugin, $html);
                }
                $output[$plugin['layout']][] = $html;
            }
            if ($plugin['layout'] == 'LAYOUT') {
                $pluginLayout = $plugin;
            }
        }

        $uniqLayout = [];
        foreach ($conf as $uniqPlugin) {
            if ($uniqPlugin['layout'] == 'LAYOUT') {
                $uniqLayout[$uniqPlugin['layout']] = $pluginLayout;
            } else {
                $uniqLayout[$uniqPlugin['layout']] = 1;
            }
        }

        foreach ($uniqLayout as $layoutKey => $plugin) {
            if ($layoutKey == 'LAYOUT') {
                $layout = $this->getTemplateToString($plugin, $data);
            } else {
                $layouts[] = '<<!' . $layoutKey . '!>>';
                $templates[] = join("", $output[$layoutKey]);
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
        return preg_replace($search, $replace, $html);
    }

    protected function modulConfigurator($data) {
        if (isset($data['article']['service'])) {
            $confFile = "dnt-view/layouts/" . Vendor::getLayout() . "/modules/" . $data['article']['service'] . "/" . $this->confFile;
            $conf = [];

            if (file_exists($confFile)) {
                $xml = simplexml_load_file($confFile);
                $allowCache = (string) $xml['cache'];
                foreach ($xml as $plugin) {
                    $name = (string) $plugin['name'];
                    foreach ($plugin->VAR as $var) {
                        $conf[$name][(string) $var['id']] = (string) $var['value'];
                    }
                }
                $data['PLUGINS'] = $conf;
            } else {
                die("No config file found <b>" . $confFile . "</b>");
            }

            foreach ($xml as $plugin) {
                $name = (string) $plugin['name'];
                foreach ($plugin->VAR as $var) {
                    $conf[$name][(string) $var['id']] = (string) $var['value'];
                }
            }
            $pluginKeys = array_keys($conf);
            $this->bodyParser($conf, $pluginKeys, $allowCache, $data);
        } else {
            die('No $data["article"]["service"] service set');
        }
    }

    protected function modulLoader($data, $file) {
        include "dnt-view/layouts/" . Vendor::getLayout() . "/modules/" . $data['article']['service'] . "/" . $file;
    }

}
