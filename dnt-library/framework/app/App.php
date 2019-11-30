<?php

class App {

    protected $client;
    protected $post;
    protected $dntLog;
    protected $dntCache;
    protected $modul;

    public function __construct($client) {
        $this->client = $client;
        $this->post = new Post();
        $this->dntLog = new DntLog();
        $this->dntCache = new Cache;
        $this->modul = new Modul();
    }

    public function run() {
        $this->client->setDomain(
                $this->client->realUrl,
                $this->client->wwwPath,
                $this->client->getSetting("still_redirect_to_domain"),
                $this->client->getSetting("language")
        );
        $this->post->init();
        $this->modul->init($this->client);

        if ($this->modul->name) {
            $this->dntLog->add(array(
                "http_response" => 200,
                "system_status" => "web_log",
                "msg" => "Web Log 200",
            ));

            if (IS_CACHING && Settings::get("cachovanie") == 1) {
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
    }

    public function dynamicLoad($dir) {

        $result = array();

        $cdir = scandir($dir);
        foreach ($cdir as $key => $value) {
            if (!in_array($value, array(".", ".."))) {
                if (!is_dir($dir . DIRECTORY_SEPARATOR . $value) && !Dnt::in_string('index.php', $value)) {
                    if (Dnt::in_string('.php', $value)) {
                        $result[] = $value;
                    }
                }
            }
        }

        return $result;
    }

    protected function inicialization($type, $starter = false) {
        $controll = (new Rest())->webhook(2);

        $classFile = (new Autoloader())->className($controll);

        $file = './' . $classFile . '.php';
        $className = $classFile . $type;
        if (!$controll) {
            if (!$starter) {
                $classFile = (new Autoloader())->className($starter);
                $className = $classFile . $type;
            } else {
                die($type . ' does not exists');
            }
        }
        foreach ($this->dynamicLoad('./') as $file) {
            if (file_exists($file)) {
                include $file;
            }
        }
        if (class_exists($className)) {
            $jobClass = new $className();
            $jobClass->run();
        } else {
            die($type . ' does not exists');
        }
    }

    public function runJob($starter = false) {
        $this->inicialization('Job', $starter);
    }

    public function runSystem($starter = false) {
        $this->inicialization('System', $starter);
    }

    public function runApi($starter = false) {
        $this->inicialization('Api', $starter);
    }

    public function runTest($starter = false) {
        $this->inicialization('Test', $starter);
    }

    public function runInstall($starter = false) {
        $this->inicialization('Install', $starter);
    }

}
