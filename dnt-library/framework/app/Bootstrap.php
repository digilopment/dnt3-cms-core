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
use DntLibrary\App\Client;
use DntLibrary\Base\Autoload;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Install;
use DntLibrary\Base\Sessions;

class Bootstrap
{
    protected string $path;
    protected ?Dnt $dnt = null;
    protected ?Install $install = null;

    public ?Client $client = null;

    public function __construct(string $path)
    {
        $this->path = dirname($path) . '/';
    }

    protected function registerDefaultGlobals(): void
    {
        if (!isset($GLOBALS['DATABASE'])) {
            $GLOBALS['DATABASE'] = '';
        }
    }

    protected function registerGlobals(Client $client): void
    {
        $GLOBALS['VENDOR_LAYOUT'] = $client->layout;
        $GLOBALS['MODULE'] = false;
        $GLOBALS['VENDOR_ID'] = $client->id;
        $GLOBALS['WEBHOOKS'] = $client->routes ?? [];
        $GLOBALS['WEBHOOK'] = $client->routes ?? [];
        $GLOBALS['GET_MODUL'] = false;
        $GLOBALS['ORIGIN_DOMAIN'] = $client->wwwPath;
        $GLOBALS['ORIGIN_DOMAIN_LNG'] = $client->lang ?? '';
        $GLOBALS['DB_DOMAIN'] = $client->realUrl ?? '';
        $GLOBALS['DB_PROTOCOL'] = false;
        $GLOBALS['ORIGIN_PROTOCOL'] = $client->originProtocol ?? '';
        $GLOBALS['ACTIVE_LANGS_ARR'] = [];
    }

    protected function registerDefine(Client $client): void
    {
        if (!defined('WWW_PATH_LANG')) {
            define('WWW_PATH_LANG', WWW_PATH . ($client->lang ?? '') . '/');
        }
    }

    public function boot(): void
    {
        $this->registerDefaultGlobals();
        $path = $this->path;
        include $path . 'dnt-library/framework/_Class/Autoload.php';
        include $path . 'dnt-library/framework/app/Autoload.php';
        $autoload = new Autoload();
        $autoload->load($path);
        $this->dnt = new Dnt();
        $this->install = new Install();
        if (!$this->install->db_exists()) {
            $this->dnt->redirect('dnt-install/index.php');
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
