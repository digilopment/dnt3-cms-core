<?php
Class Pdf{
	
	protected function imageToBase64($img){
		$type = pathinfo($img, PATHINFO_EXTENSION);
		$data = file_get_contents($img);
		$base64Img = 'data:image/' . $type . ';base64,' . base64_encode($data);
		return $base64Img;
	}
	
	private function findImagesInHtml($html) {
		preg_match_all('/src="([^"]*)"/i',$html, $result);
		return $result[1];
	}
	
	public function createPdf($path, $fileName, $pdfName, $html){
		$images = $this->findImagesInHtml($html);
		foreach($images as $img){
			$html = str_replace($img, $this->imageToBase64($img), $html);
		}
		$dompdf = new Dompdf();
		$dompdf->load_html($html);
		$dompdf->render();
		file_put_contents($path.'dnt-view/data/'.Vendor::getId().'/test.pdf', $dompdf->output());
	}
	
	public function streamPdf($path, $fileName, $pdfName, $html){
		$images = $this->findImagesInHtml($html);
		foreach($images as $img){
			$html = str_replace($img, $this->imageToBase64($img), $html);
		}
		$dompdf = new Dompdf();
		$dompdf->load_html($html);
		$dompdf->render();
		file_put_contents($path.'dnt-view/data/'.Vendor::getId().'/test.pdf', $dompdf->output());
		$dompdf->stream($pdfName, array("Attachment"=>0));
	}
	
	public function downloadPdf($path, $fileName, $pdfName, $html){
		$images = $this->findImagesInHtml($html);
		foreach($images as $img){
			$html = str_replace($img, $this->imageToBase64($img), $html);
		}
		$dompdf = new Dompdf();
		$dompdf->load_html($html);
		$dompdf->render();
		file_put_contents($path.'dnt-view/data/'.Vendor::getId().'/test.pdf', $dompdf->output());
		$dompdf->stream($pdfName, array("Attachment"=>1));
	}
}