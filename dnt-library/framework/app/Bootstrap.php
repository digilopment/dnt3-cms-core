<?php

/**
 *  class       Bootstrap
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2019
 */
class Bootstrap {

    protected $path;
    public $client;

    public function __construct($path) {
        $this->path = dirname($path) . "/";
    }

    protected function registerGlobals($client) {
        $GLOBALS['VENDOR_LAYOUT'] = $client->layout;
        $GLOBALS['VENDOR_ID'] = $client->id;
        $GLOBALS['WEBHOOKS'] = $client->routes;
        $GLOBALS['GET_MODUL'] = false;
        $GLOBALS['ORIGIN_DOMAIN'] = false;
        $GLOBALS['ORIGIN_DOMAIN_LNG'] = false;
        $GLOBALS['DB_DOMAIN'] = false;
        $GLOBALS['DB_PROTOCOL'] = false;
        $GLOBALS['ORIGIN_PROTOCOL'] = false;
        $GLOBALS['ACTIVE_LANGS_ARR'] = [];
        $GLOBALS['WEBHOOK'] = [];
    }

    protected function registerDefine($client) {
        define('WWW_PATH_LANG', WWW_PATH . $client->lang . "/");
    }
    
    public function boot() {
        $path = $this->path;
        include $path . "dnt-library/framework/_Class/Autoload.php";
        include $path . "dnt-library/framework/app/Autoload.php";
        $autoload = new Autoload();
        $autoload->load($path);
        if (!Install::db_exists()) {
            Dnt::redirect("dnt-install/index.php");
        }
        $autoloader = new Autoloader();
        $autoloader->load($path);
        $client = new Client();
        $client->init();
        $this->registerGlobals($client);
        $this->registerDefine($client);
        $this->client = $client;
    }

}
