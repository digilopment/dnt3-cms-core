<?php

class NavigationPluginControll extends Plugin {

    protected $loc = __FILE__;

    protected function menu() {
        return Navigation::getParents();
    }

    public function run() {
        $pluginData = ['nav' => $this->menu()];
        $this->layout($this->loc, 'tpl', $pluginData);
    }

}
