<?php

class DefaultModuleController{

    public function run() {
        $rest = new Rest;
        $layoutController = include "dnt-view/layouts/" . Vendor::getLayout() . "/modules/default/DefaultController.php";
        if(file_exists($layoutController)){
            include $layoutController;
        }
    }

}
