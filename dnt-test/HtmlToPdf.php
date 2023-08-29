<?php

namespace DntTest;

use DntLibrary\Base\Dnt;
use DntLibrary\Base\Pdf;
use DntLibrary\Base\Rest;

class HtmlToPdfTest
{

    protected $pdf;
    protected $dnt;
    protected $rest;
    protected $url = 'http://example.com/';

    public function __construct()
    {
        $this->pdf = new Pdf();
        $this->dnt = new Dnt();
        $this->rest = new Rest();
    }

    protected function getWebSite($url)
    {
        return file_get_contents($url);
    }

    protected function htmlTemplate()
    {
        $template = '';
        $template .= '<form action="" method="POST" >';
        $template .= '<textarea name="html" rows="10" cols="60"></textarea>';
        $template .= '<br/><input type="submit">';
        $template .= '</form>';
        return $template;
    }

    public function run()
    {
        $path = 'dnt-test/data/';
        $pdfName = 'TheWebsite' . time() . '.pdf';

        if ($this->rest->post('html')) {
            $html = $this->rest->post('html');
        } elseif ($this->rest->get('url')) {
            $html = $this->getWebSite(urldecode($this->rest->get('url')));
        } else {
            $html = $this->getWebSite($this->url);
        }

        $this->pdf->prepareHtmlToRender($path, $pdfName, $html);

        print $this->htmlTemplate();
        print ('<a href="' . WWW_PATH . $path . $pdfName . '" target="_blank">Open</a>');
    }

}
