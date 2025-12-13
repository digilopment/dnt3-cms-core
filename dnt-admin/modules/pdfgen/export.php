<?php

use DntLibrary\Base\ArticleView;
use DntLibrary\Base\DntUpload;
use DntLibrary\Base\Pdf;
use DntLibrary\Base\Rest;

$path = '../';
$rest = new Rest();
$dntUpload = new DntUpload();


$article = new ArticleView();
$post_id = $rest->get('post_id');
$export = $article->getPostParam('content', $post_id);
$pdfName = $article->getPostParam('name_url', $post_id);
$fileName = $article->getPostParam('name', $post_id);

$pdfName = $dnt->name_url($pdfName);
// Ensure content is wrapped in block-level element for DOMPDF
$content = trim($export);
if (empty($content)) {
    $content = '<p>&nbsp;</p>';
} elseif (!preg_match('/^<(div|p|h[1-6]|ul|ol|li|table|blockquote|pre|section|article|header|footer|nav|aside|main)/i', $content)) {
    // Wrap content in div if it doesn't start with a block-level element
    $content = '<div>' . $content . '</div>';
}

$html = '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
  body { font-family: DejaVu Sans, sans-serif; font-size: 12px }
</style>
<title>' . $fileName . '</title>
</head>
<body>
  ' . $content . '
</body>
</html>';
$pdf = new Pdf();
$pdf->downloadPdf($path, $fileName, $pdfName, $html);
print '<a target="_blank" href="' . $pdf->url . '">' . $pdf->url . '</a>';
