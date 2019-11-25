<?php

class Plugin {

    protected $data;

    public function __construct($data, $currentPlugin) {
        $this->data = $data;
        $this->data['ENV'] = $this->envDriver($data, $currentPlugin);
    }

    protected function envDriver($data, $plugin) {
        if (isset($data['PLUGINS'])) {
            return (object) $data['PLUGINS'][$plugin];
        }
        return false;
    }

    public function env($env) {
        if (isset($this->data['ENV']->$env)) {
            return $this->data['ENV']->$env;
        }
        return false;
    }

    protected function layout($path, $layout, $pluginData = false) {

        $this->data['plugin_data'] = $pluginData;
        $data = $this->data;
        $file = dirname($path) . "/" . $layout . ".php";
        if (file_exists($file)) {
            include $file;
        } else {
            die("layout " . $layout . " not exists");
        }
    }

}
