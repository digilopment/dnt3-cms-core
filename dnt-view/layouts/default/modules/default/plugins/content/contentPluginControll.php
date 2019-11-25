<?php

class contentPluginControll extends Plugin {

    protected $loc = __FILE__;

    public function run() {
        $pluginData = ['array' => 'pluginData'];
        $this->layout($this->loc, 'tpl', $pluginData);
    }

}
