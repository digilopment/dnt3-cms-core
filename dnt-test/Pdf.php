<?php

namespace DntTest;

use DntLibrary\Base\Pdf;

class PdfTest
{

    public function run()
    {
        $path = '../';
        $fileName = 'test';
        $pdfName = 'Test Pdf';
        $html = '<html><body>' .
                '<p>Test Put your html here, or generate it with your favourite ' .
                'templating system.</p>' .
                '<img width="420px;" src="https://www.w3schools.com/css/img_fjords.jpg"><br/><br/>' .
                '<img width="325px;" src="https://www.w3schools.com/css/img_fjords.jpg"><br/><br/>' .
                '<img width="425px;" src="https://www.w3schools.com/css/img_fjords.jpg"><br/><br/>' .
                '<img width="100px;" src="https://www.w3schools.com/css/img_fjords.jpg"><br/><br/>' .
                '<img width="525px;" src="https://www.w3schools.com/css/img_fjords.jpg"><br/><br/>' .
                '</body></html>';

        $pdf = new Pdf();
        $pdf->downloadPdf($path, $fileName, $pdfName, $html);

        echo "<b>saved to:</b> data/uploads/" . $fileName . '.pdf';
    }

}
