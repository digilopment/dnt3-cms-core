<?php

/**
 *  class       Pdf
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
Class Pdf
{

    protected $html2pdfAppKey = '8fc8992e7ab59463faeffa82343b41a21bb05a1fe5bc2102c52a02e0a171b864';

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
        file_put_contents($path . 'dnt-view/data/uploads/' . $fileName . '.pdf', $dompdf->output());
    }

    /**
     * 
     * @param type $html
     * @return string
     * api https://html2pdf.app/
     * 3869c35b440ffc26915aff525e3c47aa2be6d5b2708235f57f2bde1bbbfd95f6
     */
    
    public function prepareHtmlToRender($path, $pdfName, $html)
    {
        $minify = preg_replace(
                array(
                    '/ {2,}/',
                    '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s'
                ),
                array(
                    ' ',
                    ''
                ),
                $html
        );
        $base64 = base64_encode($minify);

        if (IS_DEVEL) {
            $generateUrl = 'http://app.query.sk/temporary-online/?html=' . $base64;
        } else {
            $generateUrl = WWW_PATH_ADMIN_2 . 'index.php?src=temporary-online&base64=' . $base64;
        }
        //docasne
        $generateUrl = 'http://app.query.sk/temporary-online/?html=' . $base64;

        $file = '../dnt-cache/temp/tests.html';
        file_put_contents($file, $base64);

        $url = 'http://app.query.sk/temporary-online/';
        $compressed = base64_encode($base64);

        $uniqid = uniqid();
        $lenght = (strlen($compressed));
        $countFloor = floor($lenght / 1000);
        $finalPart = $lenght - $countFloor;

        $stringParts = [];
        for ($i = 0; $i < $countFloor; $i++) {
            $stringParts[] = substr($compressed, $i * 1000, 1000);
        }
        $stringParts[] = substr($compressed, $countFloor * 1000, $finalPart);

        foreach ($stringParts as $key => $part) {
            file_get_contents($url . '?key=' . $key . '&id=' . $uniqid . '&part=' . $part);
        }
        $temporaryPageUrl = file_get_contents($url . '?merge=1&id=' . $uniqid);

        $output = file_get_contents('https://api.html2pdf.app/v1/generate?url=' . $temporaryPageUrl . '&apiKey=' . $this->html2pdfAppKey . '');
        file_put_contents('../' . $path . $pdfName, $output);
    }

}
