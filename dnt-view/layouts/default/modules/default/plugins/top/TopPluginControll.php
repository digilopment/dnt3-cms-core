<?php

namespace DntView\Layout\Modul\Plugin;

use DntLibrary\App\Plugin;

class TopPluginControll extends Plugin
{

    protected $loc = __FILE__;

    public function run()
    {
        $this->layout($this->loc, 'tpl', false);
    }

}
