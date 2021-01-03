<?php

/**
 *  class       Autoload
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2019
 */

namespace DntLibrary\App;

class Autoloader
{

    protected function fileLoader($file)
    {
        if (file_exists($file)) {
            include_once $file;
        }
    }

    public function addVendroClass($path, $class)
    {
        $file = dirname($path) . '/app/' . $class . '.php';
        if (!class_exists($class)) {
            if (file_exists($file)) {
                include_once $file;
            }
        }
    }

    public function addClass($path, $class, $init = false)
    {
        $file = dirname($path) . '/' . $class . '.php';
        if (!class_exists($class)) {
            if (file_exists($file)) {
                include_once $file;
                if ($init) {
                    return (new $class());
                }
            }
        }
    }

    public function className($module)
    {
        return str_replace('.php', '', str_replace(' ', '', ucwords(str_replace('-', ' ', str_replace('_', ' ', $module)))));
    }

    public function methodName($module)
    {
        return lcfirst($this->className($module));
    }

    public function load($path)
    {
        /**
         * CONFIG
         */
        if (!defined('WWW_PATH')) {
            include $path . 'dnt-library/framework/_keys/public.php';

            if (file_exists($path . 'config_pro.dnt')) {
                include $path . 'config_pro.dnt';
            } else {
                include $path . 'config.dnt';
            }
        }

        $this->fileLoader($path . 'dnt-library/framework/app/App.php');
        $this->fileLoader($path . 'dnt-library/framework/app/Db.php');
        $this->fileLoader($path . 'dnt-library/framework/app/Client.php');
        $this->fileLoader($path . 'dnt-library/framework/app/Modul.php');
        $this->fileLoader($path . 'dnt-library/framework/app/Post.php');
        $this->fileLoader($path . 'dnt-library/framework/app/PostVariants.php');
        $this->fileLoader($path . 'dnt-library/framework/app/BaseController.php');
        $this->fileLoader($path . 'dnt-library/framework/app/Plugin.php');
        $this->fileLoader($path . 'dnt-library/framework/app/AbstractUser.php');
        $this->fileLoader($path . 'dnt-library/framework/app/Stream.php');
        $this->fileLoader($path . 'dnt-library/framework/app/Render.php');
        $this->fileLoader($path . 'dnt-library/framework/app/Categories.php');
        $this->fileLoader($path . 'dnt-library/framework/app/EasyCrypt.php');
        $this->fileLoader($path . 'dnt-library/framework/app/Subscriber.php');
        $this->fileLoader($path . 'dnt-library/framework/app/Navigation.php');
        $this->fileLoader($path . 'dnt-library/framework/app/Data.php');
        $this->fileLoader($path . 'dnt-library/framework/app/AggrBuilder.php');
        $this->fileLoader($path . 'dnt-library/framework/app/OpenSslCrypt.php');
        $this->fileLoader($path . 'dnt-library/framework/app/Cart.php');
        $this->fileLoader($path . 'dnt-library/framework/app/Files.php');
        $this->fileLoader($path . 'dnt-library/framework/app/SendGrid.php');
    }

}
