<?php
/**
 *  class       Pdf
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
Class Pdf {

    /**
     * 
     * @param type $img
     * @return string
     */
    protected function imageToBase64($img) {
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
    private function findImagesInHtml($html) {
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
    public function createPdf($path, $fileName, $pdfName, $html) {
        $images = $this->findImagesInHtml($html);
        foreach ($images as $img) {
            $html = str_replace($img, $this->imageToBase64($img), $html);
        }
        $dompdf = new Dompdf();
        $dompdf->load_html($html);
        $dompdf->render();
        file_put_contents($path . 'dnt-view/data/' . Vendor::getId() . '/test.pdf', $dompdf->output());
    }

    /**
     * 
     * @param type $path
     * @param type $fileName
     * @param type $pdfName
     * @param type $html
     */
    public function streamPdf($path, $fileName, $pdfName, $html) {
        $images = $this->findImagesInHtml($html);
        foreach ($images as $img) {
            $html = str_replace($img, $this->imageToBase64($img), $html);
        }
        $dompdf = new Dompdf();
        $dompdf->load_html($html);
        $dompdf->render();
        file_put_contents($path . 'dnt-view/data/' . Vendor::getId() . '/test.pdf', $dompdf->output());
        $dompdf->stream($pdfName, array("Attachment" => 0));
    }

    /**
     * 
     * @param type $path
     * @param type $fileName
     * @param type $pdfName
     * @param type $html
     */
    public function downloadPdf($path, $fileName, $pdfName, $html) {
        $images = $this->findImagesInHtml($html);
        foreach ($images as $img) {
            $html = str_replace($img, $this->imageToBase64($img), $html);
        }
        $dompdf = new Dompdf();
        $dompdf->load_html($html);
        $dompdf->render();
        file_put_contents($path . 'dnt-view/data/' . Vendor::getId() . '/test.pdf', $dompdf->output());
        $dompdf->stream($pdfName, array("Attachment" => 1));
    }

}
