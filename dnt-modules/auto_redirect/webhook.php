<?php
class autoRedirectAbstractModulController{
	
	public function run(){
		$articleList 	= new ArticleList;
		$rest 			= new Rest;
		$articleId 		= $rest->webhook(2); 

		$name_url = $articleList->getArticleUrl($articleId, false);
		$url = $GLOBALS['ORIGIN_DOMAIN_LNG']."/".$name_url;
		
		//internal redirect
		if(Dnt::in_string("<WWW_PATH>", $name_url)){
			Dnt::redirect(str_replace("<WWW_PATH>", WWW_PATH, $name_url));
		}
		
		//external redirect
		if(Dnt::in_string(":\/\/", $name_url)){
			Dnt::redirect($name_url);
		}
		
		//sitemap redirect
		foreach(Webhook::getSitemapModules() as $modul){
			if($modul == $name_url){
				Dnt::redirect($url);
			}
		}
		
		Dnt::redirect($articleList->getArticleUrl($articleId));
	}
}

autoRedirectAbstractModulController::run();
