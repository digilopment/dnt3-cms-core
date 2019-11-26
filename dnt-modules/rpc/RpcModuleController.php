<?php

class RpcModuleController extends Modul {

    protected $loc = __FILE__;
    
    public function run() {
        $rest = new Rest;
        if ($rest->webhook(2) == "subscriber") {
            include "dnt-admin/modules/subscriber/webhook.php";
        } else {
            if (!$this->loadVendorModul($this->ModuleControllerToModuleName($this->loc))) {
                die('no module, no acction');
            }
        }
    }
}