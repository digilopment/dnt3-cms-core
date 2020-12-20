<?php

namespace DntView\Layout\Modul;

use DntLibrary\App\BaseController;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\MultyLanguage;

class DefaultController extends BaseController
{

	public function __construct(){
		parent::__construct();
		$this->frontend = new Frontend();
		$this->article = new ArticleView();
		$this->dnt = new Dnt();
		$this->multiLanguage = new MultyLanguage();
	}
    public function run()
    {
        $id = $this->article->getStaticId();
        if ($id) {
            header("HTTP/1.0 404 Not Found");
            $data = $this->frontend->get();
			$data['dnt'] = $this->dnt;
			$data['frontend'] = $this->frontend;
			$data['translate'] = function($message) use ($data){
				return $this->multiLanguage->translate($data, $message, "translate");
			};
            $this->modulConfigurator($data);
        } else {
            $this->dnt->redirect(WWW_PATH . "404");
        }
    }

}
