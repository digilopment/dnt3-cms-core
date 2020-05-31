<?php

/**
 *  class       Bootstrap
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2019
 */

namespace DntLibrary\App;

use DntLibrary\App\Autoloader;
use DntLibrary\Base\Autoload;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Install;
use DntLibrary\Base\Sessions;
use DntLibrary\App\Client;

class Bootstrap
{

    protected $path;
    public $client;

    public function __construct($path)
    {
        $this->path = dirname($path) . "/";
    }

    protected function registerGlobals($client)
    {
        $GLOBALS['VENDOR_LAYOUT'] = $client->layout;
        $GLOBALS['MODULE'] = false;
        $GLOBALS['VENDOR_ID'] = $client->id;
        $GLOBALS['WEBHOOKS'] = $client->routes;
        $GLOBALS['WEBHOOK'] = $client->routes;
        $GLOBALS['GET_MODUL'] = false;
        $GLOBALS['ORIGIN_DOMAIN'] = $client->wwwPath;
        $GLOBALS['ORIGIN_DOMAIN_LNG'] = $client->lang;
        $GLOBALS['DB_DOMAIN'] = $client->realUrl;
        $GLOBALS['DB_PROTOCOL'] = false;
        $GLOBALS['ORIGIN_PROTOCOL'] = $client->originProtocol;
        $GLOBALS['ACTIVE_LANGS_ARR'] = [];
    }

    protected function registerDefine($client)
    {
        define('WWW_PATH_LANG', WWW_PATH . $client->lang . "/");
    }

    public function boot()
    {
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
        $session = new Sessions();
        $session->init();
        $client->init();
        $this->registerGlobals($client);
        $this->registerDefine($client);
        $this->client = $client;
    }

}
