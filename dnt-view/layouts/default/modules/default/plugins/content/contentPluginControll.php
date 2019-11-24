<?php

class contentPluginControll extends Plugin {

    public function run() {
        $pluginData = ['array' => 'pluginData'];
        $this->layout(__FILE__, 'tpl', $pluginData);
    }

}
