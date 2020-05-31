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

}
