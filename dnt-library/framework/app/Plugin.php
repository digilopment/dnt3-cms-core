<?php

namespace DntLibrary\App;

use DntLibrary\Base\Settings;

class Plugin
{
    protected $data;

    protected $settings;

    public function __construct($data, $currentPlugin, $plugin = false)
    {
        $this->settings = new Settings();
        $this->data = $data;
        $pluginName = isset($plugin['name']) ? $plugin['name'] : false;
        $this->data['ENV'] = $this->envDriver($data, $currentPlugin, $pluginName);
    }

    protected function modul()
    {
        return $this->settings->getGlobals()->module;
    }

    protected function envDriver($data, $pluginId, $pluginName = false)
    {
        if ($pluginName) {
            return (object) $data['PLUGINS'][$pluginName];
        } elseif (isset($data['PLUGINS'])) {
            return (object) $data['PLUGINS'][$pluginId];
        }
        return false;
    }

    public function env($env)
    {
        if (isset($this->data['PLUGINS'][$this->pluginId][$env])) {
            return $this->data['PLUGINS'][$this->pluginId][$env];
        }
        return false;
    }

    protected function layout($path, $layout, $pluginData = false, $toString = false)
    {
        ob_start();
        $this->data['plugin_data'] = $pluginData;
        $data = $this->data;
        $file = dirname($path) . '/' . $layout . '.php';
        if (file_exists($file)) {
            include $file;
        } else {
            die('layout ' . $layout . ' not exists');
        }
        $response = ob_get_clean();
        if ($toString) {
            return $response;
        } else {
            print $response;
        }
    }
}
