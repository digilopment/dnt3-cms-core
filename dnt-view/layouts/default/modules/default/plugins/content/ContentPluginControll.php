<?php

namespace DntView\Layout\Modul\Plugin;

use DntLibrary\App\Plugin;

class ContentPluginControll extends Plugin
{
    protected $loc = __FILE__;

    public function run()
    {
        $pluginData = ['array' => 'pluginData'];
        $this->layout($this->loc, 'tpl', $pluginData);
    }
}
