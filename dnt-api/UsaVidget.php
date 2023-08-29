<?php

namespace DntApi;

use DntLibrary\App\Render;

class UsaVidgetApi
{

    protected $serviceUrl = '../dnt-jobs/data/usa-vidget.json';
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
