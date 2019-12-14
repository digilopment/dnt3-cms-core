<?php

class LogoutController extends AdminController
{

    protected $session;

    public function __construct()
    {
        $this->session = new Sessions();
    }

    public function indexAction()
    {
        $this->session->remove("admin_logged");
        $this->session->remove("admin_id");
        Dnt::redirect(WWW_PATH_ADMIN_2);
    }

}
