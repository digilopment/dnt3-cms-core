<?php

class CovidWorldBetaApi
{

    protected $serviceUrl = '../dnt-jobs/data/covidWorldBeta.json';
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
        (new Render($this->content))->render();
    }

}
