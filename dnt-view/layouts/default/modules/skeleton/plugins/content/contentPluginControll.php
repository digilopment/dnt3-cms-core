<?php

class contentPluginControll extends Plugin {
    
    protected $loc = __FILE__;
    
    public function run() {
        $this->layout($this->loc, 'tpl');
    }

}
