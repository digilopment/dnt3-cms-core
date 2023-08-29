<?php

namespace DntAdmin\Moduls;

use DntAdmin\App\AdminController;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Sessions;

class LogoutController extends AdminController
{

    protected $session;
    protected $dnt;

    public function __construct()
    {
        $this->session = new Sessions();
        $this->dnt = new Dnt();
    }

    public function indexAction()
    {
        $this->session->remove('admin_logged');
        $this->session->remove('admin_id');
        $this->dnt->redirect(WWW_PATH_ADMIN_2);
    }

}
