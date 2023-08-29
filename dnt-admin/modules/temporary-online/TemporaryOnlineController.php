<?php
namespace DntAdmin\Moduls;

use DntAdmin\App\AdminController;
use DntLibrary\App\Stream;
use DntLibrary\Base\Rest;

class TemporaryOnlineController extends AdminController
{

    protected $rest;
    protected $stream;
    protected $tempPath = '../dnt-cache/temp/';
    protected $streamOutPath = '../dnt-view/data/static/';

    public function __construct()
    {
        $this->rest = new Rest();
        $this->stream = new Stream();
    }

    function indexAction()
    {
        if ($this->rest->get('part')) {
            $this->stream->part($this->tempPath);
        }

        if ($this->rest->get('merge')) {
            $this->stream->merge($this->tempPath, $this->streamOutPath);
        }
    }

}
