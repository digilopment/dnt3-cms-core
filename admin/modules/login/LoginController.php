<?php

class LoginController extends AdminController
{

    protected $loc = __FILE__;

    protected function processLogin()
    {
        $rest = new Rest();
        $user = new UserAdmin();
        $session = new Sessions();

        $response = [];

        $email = $rest->post('email');
        $pass = $rest->post('pass');
        if ($user->validProcessLogin($email, $pass)) {
            $session->set('admin_logged', '1');
            $session->set('admin_id', $email);
            AdminUser::updateDatetime(Vendor::getId(), $email);
            $response = [
                'redirect' => WWW_PATH_ADMIN_2 . '?src=' . DEFAULT_MODUL_ADMIN,
                'message' => 'Login correct',
                'status' => '1',
            ];
        } else {
            $response = [
                'redirect' => WWW_PATH_ADMIN_2 . '?src=' . DEFAULT_MODUL_ADMIN,
                'message' => 'Bad credencials',
                'status' => '0',
            ];
        }
        return (object) $response;
    }

    public function indexAction()
    {
        $this->loadTemplate($this->loc, 'default');
    }

    public function loginAction()
    {
        if ($this->hasPost('sent')) {
            $response = $this->processLogin();
            if ($response->status == 1) {
                Dnt::redirect($response->redirect);
            } else {
                $data['title'] = 'Problém s prihlásením';
                $data['content'] = 'Zadali ste nesprávne <b>meno</b>, alebo <b>heslo</b>. Akciu prosím zopakujte.<br/><br/> <a class="btn btn-primary" href="#" onclick="goBack()">Naspäť</a>';
                $this->loadTemplate($this->loc, 'error', $data);
            }
        } else {
            $data = [
                'message' => 'No post',
                'status' => '1',
            ];
            $this->loadTemplate($this->loc, 'default', $data);
        }
    }
    
    public function autoLoginAction()
    {
        $rest = new Rest();
        $dnt = new Dnt();
        $session = new Sessions();
        if (isset($_SERVER["HTTP_REFERER"]) && Dnt::in_string(DOMAIN, $_SERVER["HTTP_REFERER"])) {
            $vendor_id = $rest->get("id_entity");
            $email = $rest->get("admin_id");
            if (AdminUser::emailExists($email, $vendor_id)) {
                $session->set("admin_logged", "1");
                $session->set("admin_id", $rest->get("admin_id"));
                AdminUser::updateDatetime(Vendor::getId(), $rest->get("admin_id"));
                $dnt->redirect(WWW_PATH_ADMIN . "?src=" . DEFAULT_MODUL_ADMIN);
            } else {
                $data['email'] = $email;
                $this->loadTemplate($this->loc, 'errorChangeDomain', $data);
            }
        } else {
            $dnt->redirect("index?src=" . DEFAULT_MODUL_ADMIN);
        }
    }

}
