<?php

namespace DntView\Layout\Modul\Plugin;

use DntLibrary\App\Plugin;
use DntLibrary\Base\Navigation;

class NavigationPluginControll extends Plugin
{
    protected $loc = __FILE__;

    protected $menu;

    /**
     * this is a prototype of a data compose method
     * this methods are private
     */
    private function menu()
    {
        return Navigation::getParents();
    }

    /**
     * this is a initialization method
     * not require ()
     */
    public function init()
    {
        $this->menu = $this->menu();
    }

    /**
     * run plugin in autoloader class
     * implicated all initialized objects and add current layout
     */
    public function run()
    {
        $pluginData = ['nav' => $this->menu];
        $this->layout($this->loc, 'tpl', $pluginData);
    }
}
