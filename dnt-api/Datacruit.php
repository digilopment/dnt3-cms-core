<?php

namespace DntApi;

use DntLibrary\App\Render;

class DatacruitApi
{

    protected $serviceUrl = '../dnt-jobs/data/datacruit.json';
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
        (new Render($this->content))->renderWithJson();
    }

}
