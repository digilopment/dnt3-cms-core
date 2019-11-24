<?php

class defaultModulController extends BaseController {

    public function run() {
        $article = new ArticleView;
        $id = $article->getStaticId();

        if ($id) {
            $article = new ArticleView;
            $data = Frontend::get();
            $this->modulConfigurator($data);
        } else {
            Dnt::redirect(WWW_PATH . "404");
        }
    }

}

$modul = new defaultModulController();
$modul->run();
