<?php

class OnlinePdfTest
{

    protected $pdf;
    protected $dnt;
    protected $url = 'http://example.com';

    public function __construct()
    {
        $this->pdf = new Pdf();
        $this->dnt = new Dnt();
    }

    protected function getWebSite($url)
    {
        return file_get_contents($url);
    }

    public function run()
    {
        $path = 'dnt-test/data/';
        $pdfName = 'TheWebsite' . time() . '.pdf';
        $html = $this->getWebSite($this->url);

        $this->pdf->prepareHtmlToRender($path, $pdfName, $html);
        print ('<a href="' . WWW_PATH . $path . $pdfName . '" target="_blank">Open</a>');
    }

}
