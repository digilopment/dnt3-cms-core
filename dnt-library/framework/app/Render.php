<?php

namespace DntLibrary\App;

class Render
{

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        print $this->data;
    }

    public function renderWithJson()
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        print $this->data;
    }

}
