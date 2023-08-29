<?php

namespace DntModules\Controllers;

use DntLibrary\App\Client;
use DntLibrary\Base\ArticleList;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Webhook;

class AutoRedirectModuleController extends Client
{
    public function __construct()
    {
        parent::__construct();
        $this->articleList = new ArticleList();
        $this->articleView = new ArticleView();
        $this->rest = new Rest();
        $this->webhook = new Webhook();
        $this->dnt = new Dnt();
    }

    public function run()
    {
        $this->init();
        $articleId = $this->rest->webhook(2);
        $name_url = $this->articleList->getArticleUrl($articleId, false);
        $url = $this->wwwPath . $this->lang . '/' . $name_url;

        $type = $this->articleView->getPostParam('type', $articleId);
        //internal redirect
        if ($this->dnt->in_string('<WWW_PATH>', $name_url)) {
            $this->dnt->redirect(str_replace('<WWW_PATH>', WWW_PATH, $name_url));
        }

        //external redirect
        if ($this->dnt->in_string(':\/\/', $name_url)) {
            $this->dnt->redirect($name_url);
        }

        //sitemap redirect
        foreach ($this->webhook->getSitemapModules() as $modul) {
            if ($modul == $name_url) {
                $this->dnt->redirect($url);
            }
        }

        if ($type == 'video') {
            $this->dnt->redirect($this->articleList->getArticleUrl($articleId, true, $type));
        } else {
            $this->dnt->redirect($this->articleList->getArticleUrl($articleId));
        }
    }
}
