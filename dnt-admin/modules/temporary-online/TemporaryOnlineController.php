<?php

class TemporaryOnlineController extends AdminController
{

    protected $rest;
    public function __construct()
    {
        $this->rest = new Rest();
    }
    public function indexAction()
    {
        if ($this->rest->get('base64')) {
            $html = base64_decode($this->rest->get('base64'));
            print $html;
        }
    }

}
