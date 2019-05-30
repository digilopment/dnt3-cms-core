<?php
class defaultModulController{
	
	public function run(){
		$article 	= new ArticleView;
		$id = $article->getStaticId();
		
		if($id){
			header("HTTP/1.0 404 Not Found");
			$article 	= new ArticleView;
			$rest 		= new Rest;
			
			$articleName = $article->getPostParam("name",  $id);
			$service_id = $article->getPostParam("service_id",  $id);
			$articleImage = $article->getPostImage($id);
			$data = Frontend::get();
			include "tpl.php";
		}else{
			Dnt::redirect(WWW_PATH."404");
		}
	}
}

$modul = new defaultModulController();
$modul->run();