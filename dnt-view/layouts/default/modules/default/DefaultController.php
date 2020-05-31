<?php

namespace DntView\Layout\Modul;

use DntLibrary\App\BaseController;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Frontend;

class DefaultController extends BaseController
{

    public function run()
    {
        $article = new ArticleView;
        $id = $article->getStaticId();
        if ($id) {
            header("HTTP/1.0 404 Not Found");
            $data = Frontend::get();
            $this->modulConfigurator($data);
        } else {
            Dnt::redirect(WWW_PATH . "404");
        }
    }

}
