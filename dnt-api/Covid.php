<?php

namespace DntApi;

use DntLibrary\App\Render;

class CovidApi
{

    protected $serviceUrl = '../dnt-jobs/data/covid.json';
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
