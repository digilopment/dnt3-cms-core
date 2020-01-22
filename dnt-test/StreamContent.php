<?php

class StreamContentTest
{

    protected $pdf;
    protected $content = 'https://static.markiza.sk/media/a501/image/file/21/1747/g2ao.splnomocnenec_zlatice_kusnirovej_roman_kvasnica_.jpg';

    public function __construct()
    {
        $this->stream = new Stream();
    }

    public function run()
    {
        $pathToSave = 'dnt-test/data/';
        $contentToStream = $this->content;
        $content = $this->stream->streamControll($contentToStream, $pathToSave);
        print ('<a href="' . WWW_PATH . $pathToSave . $content['contentName'] . '" target="_blank">Local Open</a><br/>');
        print ('<a href="' . $content['serverUrl'] . '" target="_blank">Server Open</a>');
    }

}
