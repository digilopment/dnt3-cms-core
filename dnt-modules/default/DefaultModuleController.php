<?php

class DefaultModuleController extends Modul
{

    protected $loc = __FILE__;

    public function run()
    {
        if (!$this->loadVendorModul($this->ModuleControllerToModuleName($this->loc))) {
            die('no module, no acction');
        }
    }

}
