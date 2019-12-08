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

}
