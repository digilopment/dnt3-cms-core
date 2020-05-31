<?php

namespace DntModules\Controllers;

use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Dnt;

class StaticRedirectModuleController
{

    public function run()
    {
        $article = new ArticleView();
        $id = $article->getStaticId();
        $name_url = $article->getPostParam("embed", $id);
        if (Dnt::in_string("<WWW_PATH>", $name_url)) {
            $url = str_replace("<WWW_PATH>", WWW_PATH, $name_url);
            Dnt::redirect($url);
        } elseif (Dnt::in_string(":\/\/", $name_url)) {
            Dnt::redirect($name_url);
        } else {
            Dnt::redirect($name_url);
        }
    }

}
