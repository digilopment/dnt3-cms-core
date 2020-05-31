<?php

namespace DntAdmin\Moduls;

use DntAdmin\App\AdminController;
use DntLibrary\Base\Dnt;

class HomeController extends AdminController
{

    protected $dnt;

    public function __construct()
    {
        $this->dnt = new Dnt();
    }

    public function indexAction()
    {

        $this->dnt->redirect(WWW_PATH_ADMIN_2 . '?src=' . DEFAULT_MODUL_ADMIN);
    }

}
