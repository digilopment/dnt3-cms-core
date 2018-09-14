<?php

$path		= "../";
$rest 		= new Rest;
$dntUpload 	= new DntUpload;


$article 	= new ArticleView;
$post_id 	= $rest->get("post_id");
$export 	= $article->getPostParam("content",  $post_id);
$pdfName 	= $article->getPostParam("name_url",  $post_id);
$fileName 	= $article->getPostParam("name",  $post_id);

$pdfName = Dnt::name_url($pdfName);

$html = '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
  body { font-family: DejaVu Sans, sans-serif; font-size: 12px }
</style>
<title>'.$fileName.'</title>
</head>
<body>
  '.$export.'
</body>
</html>';

$pdf = new Pdf;
$pdf->downloadPdf($path, $fileName, $pdfName, $html);
$pdf->streamPdf($path, $fileName, $pdfName, $html);
