<?php

class DefaultController extends BaseController {

    public function run() {
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
