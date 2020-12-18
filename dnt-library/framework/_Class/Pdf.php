<?php

/**
 *  class       Pdf
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\App\Stream;
use DntLibrary\Base\Dnt;
use DOMPDF;

class Pdf
{

    protected $html2pdfAppKey = '8fc8992e7ab59463faeffa82343b41a21bb05a1fe5bc2102c52a02e0a171b864';
    protected $stream;
    public $file;
    public $url;

    public function __construct()
    {
        $this->stream = new Stream();
        $this->dnt = new Dnt();
    }

    /**
     * 
     * @param type $img
     * @return string
     */
    protected function imageToBase64($img)
    {
        $type = pathinfo($img, PATHINFO_EXTENSION);
        $data = file_get_contents($img);
        $base64Img = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64Img;
    }

    /**
     * 
     * @param type $html
     * @return type
     */
    private function findImagesInHtml($html)
    {
        preg_match_all('/src="([^"]*)"/i', $html, $result);
        return $result[1];
    }

    /**
     * 
     * @param type $path
     * @param type $fileName
     * @param type $pdfName
     * @param type $html
     */
    public function createPdf($path, $fileName, $pdfName, $html)
    {
        $images = $this->findImagesInHtml($html);
        foreach ($images as $img) {
            $html = str_replace($img, $this->imageToBase64($img), $html);
        }
        $dompdf = new Dompdf();
        $dompdf->load_html($html);
        $dompdf->render();
        file_put_contents($path . 'dnt-view/data/uploads/test.pdf', $dompdf->output());
    }

    /**
     * 
     * @param type $path
     * @param type $fileName
     * @param type $pdfName
     * @param type $html
     */
    public function streamPdf($path, $fileName, $pdfName, $html)
    {
        $images = $this->findImagesInHtml($html);
        foreach ($images as $img) {
            $html = str_replace($img, $this->imageToBase64($img), $html);
        }
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->set_paper('A4');
        $dompdf->render();
        $dompdf->stream($pdfName . '.pdf', array("Attachment" => 1));
    }

    /**
     * 
     * @param type $path
     * @param type $fileName
     * @param type $pdfName
     * @param type $html
     */
    public function downloadPdf($path, $fileName, $pdfName, $html)
    {
        $images = $this->findImagesInHtml($html);
        foreach ($images as $img) {
            $html = str_replace($img, $this->imageToBase64($img), $html);
        }

        $dompdf = new Dompdf();
        $dompdf->set_option('enable_remote', TRUE);
        $dompdf->set_option('enable_css_float', TRUE);
        $dompdf->load_html($html);
        $dompdf->render();
        $this->file = $path . 'dnt-view/data/uploads/' . $fileName . '.pdf';
        $this->url = WWW_PATH . 'dnt-view/data/uploads/' . $fileName . '.pdf';
        file_put_contents($this->file, $dompdf->output());
    }

    /**
     * 
     * @param type $path
     * @param type $fileName
     * @param type $html
     * api https://html2pdf.app/
     * 3869c35b440ffc26915aff525e3c47aa2be6d5b2708235f57f2bde1bbbfd95f6
     */
    public function prepareHtmlToRender($path, $fileName, $html)
    {
        $converAs = 'html';
        $streamResponse = $this->stream->streamIn($html, $this->dnt->getFileName($fileName), $converAs);
        $mergePageUrl = $streamResponse['url'];
        $output = file_get_contents('https://api.html2pdf.app/v1/generate?url=' . $mergePageUrl . '&apiKey=' . $this->html2pdfAppKey . '');
        unlink($streamResponse['tmpFile']);
        file_put_contents('../' . $path . $fileName, $output);
    }

}
