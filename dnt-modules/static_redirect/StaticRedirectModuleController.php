<?php

namespace DntModules\Controllers;

use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Dnt;

class StaticRedirectModuleController
{
    public function __construct()
    {
        $this->dnt = new Dnt();
    }

    public function run()
    {
        $article = new ArticleView();
        $id = $article->getStaticId();
        $name_url = $article->getPostParam('embed', $id);
        if ($this->dnt->in_string('<WWW_PATH>', $name_url)) {
            $url = str_replace('<WWW_PATH>', WWW_PATH, $name_url);
            $this->dnt->redirect($url);
        } elseif ($this->dnt->in_string(':\/\/', $name_url)) {
            $this->dnt->redirect($name_url);
        } else {
            $this->dnt->redirect($name_url);
        }
    }
}
