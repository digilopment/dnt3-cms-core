<?php

class Plugin {

    protected $data;

    public function __construct($data, $currentPlugin) {
        $this->data = $data;
        $this->data['ENV'] = Frontend::ENV($data, $currentPlugin);
    }

    protected function layout($path, $layout) {

        $data = $this->data;
        $file = dirname($path) . "/" . $layout . ".php";
        if (file_exists($file)) {
            include $file;
        } else {
            die("layout " . $layout . " not exists");
        }
    }

}
