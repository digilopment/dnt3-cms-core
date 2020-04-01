<?php

class CovidWorldApi
{

    protected $serviceUrl = '../dnt-jobs/data/covidWorlds.json';
    protected $content;

    public function __construct()
    {
        $this->getData();
    }

    protected function getData()
    {
        $content = '[]';
        if (file_exists($this->serviceUrl)) {
            $content = file_get_contents($this->serviceUrl);
        }
        $this->content = $content;
    }

    public function run()
    {
        print $this->content;
    }

}
