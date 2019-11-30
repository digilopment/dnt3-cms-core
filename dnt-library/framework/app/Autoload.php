<?php

/**
 *  class       Autoload
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2019
 */
class Autoloader {

    protected function fileLoader($file) {
        if (file_exists($file)) {
            include $file;
        }
    }
    
    public function addVendroClass($path, $class) {
        $file = dirname($path).'/app/'.$class.".php";
        if(!class_exists($class)){
            if (file_exists($file)) {
                include $file;
            }
        }
    }

    public function className($module) {
        return str_replace('.php', '', str_replace(' ', '', ucwords(str_replace('-', ' ', str_replace('_', ' ', $module)))));
    }

    public function load($path) {
        /**
         * CONFIG
         */
        if (!defined('WWW_PATH')) {
            include $path . "dnt-library/framework/_keys/public.php";

            if (file_exists($path . "config_pro.dnt")) {
                include $path . "config_pro.dnt";
            } else {
                include $path . "config.dnt";
            }
        }

        $this->fileLoader($path . "dnt-library/framework/app/App.php");
        $this->fileLoader($path . "dnt-library/framework/app/Db.php");
        $this->fileLoader($path . "dnt-library/framework/app/Client.php");
        $this->fileLoader($path . "dnt-library/framework/app/Modul.php");
        $this->fileLoader($path . "dnt-library/framework/app/Post.php");
        $this->fileLoader($path . "dnt-library/framework/app/BaseController.php");
        $this->fileLoader($path . "dnt-library/framework/app/Plugin.php");
    }

}
