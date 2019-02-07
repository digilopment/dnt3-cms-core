<?php
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
$rest = new Rest;
$dntUpload = new DntUpload;

/** 
 *
 *EXPORT TO PDF
 *
 *
**/
$fileName 	= 'test.pdf';
$pdfName 	= 'Test Pdf';
$html =
  '<html><body>'.
  '<p>Test Put your html here, or generate it with your favourite '.
  'templating system.</p>'.
  '<img width="420px;" src="https://www.w3schools.com/css/img_fjords.jpg"><br/><br/>'.
  '<img width="325px;" src="https://www.w3schools.com/css/img_fjords.jpg"><br/><br/>'.
  '<img width="425px;" src="https://www.w3schools.com/css/img_fjords.jpg"><br/><br/>'.
  '<img width="100px;" src="https://www.w3schools.com/css/img_fjords.jpg"><br/><br/>'.
  '<img width="525px;" src="https://www.w3schools.com/css/img_fjords.jpg"><br/><br/>'.
  '<img width="125px;" src="https://nn5.joj.sk/storage/media-new/live-images/live/0009fdd6-bdd0-4c7b-bf20-6eeb93830f42/aaec1625e0dc997e51f6788b2721af95.jpg"><br/>'.
  '</body></html>';

$pdf = new Pdf;
$pdf->streamPdf($path, $fileName, $pdfName, $html);


