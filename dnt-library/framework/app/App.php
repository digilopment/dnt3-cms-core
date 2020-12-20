<?php

namespace DntLibrary\App;

use DntAdmin\App\RouterAdmin;
use DntLibrary\App\Autoloader;
use DntLibrary\App\Modul;
use DntLibrary\App\Post;
use DntLibrary\Base\Cache;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\DntLog;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class App
{

    public $client;
    protected $post;
    protected $dntLog;
    protected $dntCache;
    protected $modul;

    public function __construct($client)
    {
        $this->client = $client;
        $this->post = new Post();
        $this->dntLog = new DntLog();
        $this->dntCache = new Cache;
        $this->modul = new Modul();
        $this->vendor = new Vendor();
        $this->dnt = new Dnt();
    }

    public function run()
    {
        $this->client->setDomain(
                $this->client->realUrl,
                $this->client->wwwPath,
                $this->client->getSetting("still_redirect_to_domain"),
                $this->client->getSetting("language")
        );
        $this->post->init();
        $this->modul->init($this->client);
        if ($this->modul->name) {
            $GLOBALS['VENDOR_MODULE'] = $this->modul->name;
            $this->dntLog->add(array(
                "http_response" => 200,
                "system_status" => "web_log",
                "msg" => "Web Log 200",
            ));

            if (IS_CACHING && $this->client->getSetting("cachovanie") == 1) {
                $this->dntCache->start();
                $this->modul->load($this->client, $this->modul->name);
                $this->dntCache->end();
            } else {
                $this->modul->load($this->client, $this->modul->name);
            }
        } else {
            $this->dntLog->add(array(
                "http_response" => 404,
                "system_status" => "web_log",
                "msg" => "Web Log 404",
            ));
            $this->modul->load($this->client, "default");
        }
        $this->dntLog->debugQuery($this->modul);
    }

    public function dynamicLoad($dir)
    {

        $result = array();

        $cdir = scandir($dir);
        foreach ($cdir as $key => $value) {
            if (!in_array($value, array(".", ".."))) {
                if (!is_dir($dir . DIRECTORY_SEPARATOR . $value) && !$this->dnt->in_string('index.php', $value)) {
                    if ($this->dnt->in_string('.php', $value)) {
                        $result[] = $value;
                    }
                }
            }
        }

        return $result;
    }

    protected function inicialization($type, $starter = false)
    {
        $controll = (new Rest())->webhook(2);
        $classFile = (new Autoloader())->className($controll);

        if ($type == 'Job') {
            $nameSpace = '\DntJobs\\';
        } else {
            $nameSpace = '\Dnt' . $type . '\\';
        }

        $file = './' . $classFile . '.php';
        $className = $classFile . $type;
        if (!$controll) {
            if (!$starter) {
                $classFile = (new Autoloader())->className($starter);
                $className = $classFile . $type;
            } else {
                die($type . ' file does not exists');
            }
        }

        $layout = $this->vendor->getLayout();
        $fileVendor = '';
        if ($layout != 'default') {
            $fileVendor = '../dnt-view/layouts/' . $layout . '/dnt-jobs/' . $classFile . '.php';
        }

        if (file_exists($fileVendor)) {
            include_once $fileVendor;
        } elseif (file_exists($file)) {
            include_once $file;
        }
        $className = $nameSpace . $className;
        if (class_exists($className)) {
            $jobClass = new $className();
            $jobClass->run();
        } else {
            die($type . ' does not exists');
        }
    }

    protected function loadApp()
    {
        foreach ($this->dynamicLoad('./app/') as $file) {
            $path = './app/' . $file;
            if (file_exists($path)) {
                include $path;
            }
        }
    }

    public function runJob($starter = false)
    {
        $this->inicialization('Job', $starter);
    }

    public function runSystem($starter = false)
    {
        $this->inicialization('System', $starter);
    }

    public function runApi($starter = false)
    {
        $this->inicialization('Api', $starter);
    }

    public function runTest($starter = false)
    {
        $this->inicialization('Test', $starter);
    }

    public function runInstall($starter = false)
    {
        $this->inicialization('Install', $starter);
    }

    public function runAdmin()
    {
        $this->loadApp();
        $roter = new RouterAdmin();
        $roter->init();
    }

}
