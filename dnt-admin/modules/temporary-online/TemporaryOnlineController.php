<?php

class TemporaryOnlineController extends AdminController
{

    protected $rest;
    protected $stream;
    protected $tempPath = '../dnt-cache/parts/';
    protected $streamOutPath = '../dnt-view/data/static/';

    public function __construct()
    {
        $this->rest = new Rest();
        $this->stream = new Stream();
    }

    function indexAction()
    {
        if ($this->rest->get('part') || $this->rest->get('merge')) {
            $this->stream->streamOut($this->tempPath, $this->streamOutPath);
        }
    }

}
