<?php

namespace DntAdmin\Moduls;

use DntAdmin\App\AdminController;
use DntLibrary\Base\AdminMailer;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Mailer;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;

class MailerController extends AdminController
{

    protected $loc = __FILE__;
    protected $db;
    protected $rest;
    protected $adminMailer;
    protected $dnt;
    protected $mailer;
    protected $vendor;
    protected $session;
    protected $categories = [];
    protected $countEmails = [];
    protected $sentMailPerRequest = 5;
    protected $sleep = 1;

    public function __construct()
    {
        $this->db = new DB();
        $this->rest = new Rest();
        $this->adminMailer = new AdminMailer();
        $this->dnt = new Dnt();
        $this->vendor = new Vendor();
        $this->session = new Sessions();
        $this->mailer = new Mailer();
    }

    protected function categories()
    {
        $query = $this->adminMailer->catQuery();
        if ($this->db->num_rows($query) > 0) {
            $this->categories = $this->db->get_results($query);
        }
    }

    protected function mailerQuery()
    {
        $this->countEmails = $this->db->num_rows($this->adminMailer->getAll());
    }

    /**
     * run before {any}Action
     */
    public function init()
    {
        $this->categories();
        $this->mailerQuery();
    }

    public function indexAction()
    {
        $data['db'] = $this->db;
        $data['rest'] = $this->rest;
        $data['adminMailer'] = $this->adminMailer;
        $data['dnt'] = $this->dnt;
        $data['vendor'] = $this->vendor;
        $data['categories'] = $this->categories;
        $data['countMails'] = $this->countEmails;
        $this->loadTemplate($this->loc, 'default', $data);
    }

    public function addCatAction()
    {
        if ($this->hasPost('sent')) {
            $name = $this->rest->post('name');
            $name_url = $this->dnt->name_url($name);
            $insertedData = array(
                'name' => $name,
                'name_url' => $name_url,
                'vendor_id' => $this->vendor->getId(),
                '`show`' => 1,
                '`order`' => 1,
            );
            $this->db->insert('dnt_mailer_type', $insertedData);
            $this->dnt->redirect(WWW_PATH_ADMIN_2 . '?src=mailer');
        } else {
            $this->dnt->redirect(WWW_PATH_ADMIN_2 . '?src=' . DEFAULT_MODUL_ADMIN);
        }
    }

    public function addMailAction()
    {
        if ($this->hasPost('sent')) {
            $name = $this->rest->post('name');
            $surname = $this->rest->post('surname');
            $email = $this->rest->post('email');
            $cat_id = $this->rest->post('cat_id');

            $insertedData = array(
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'vendor_id' => $this->vendor->getId(),
                'cat_id' => $cat_id,
                'datetime_creat' => $this->dnt->datetime(),
                'datetime_update' => $this->dnt->datetime()
            );
            $this->db->insert('dnt_mailer_mails', $insertedData);
            $this->dnt->redirect(WWW_PATH_ADMIN_2 . '?src=mailer');
        } else {
            $this->dnt->redirect(WWW_PATH_ADMIN_2 . '?src=' . DEFAULT_MODUL_ADMIN);
        }
    }

    public function editMailAction()
    {
        if ($this->hasPost('sent')) {
            $post_id = $this->rest->get('post_id');
            $title = $this->rest->post('title');
            $name = $this->rest->post('name');
            $surname = $this->rest->post('surname');
            $email = str_replace(' ', '', $this->rest->post('email'));
            $cat_id = $this->rest->post('cat_id');
            $return = $this->rest->post('return');
            $table = 'dnt_mailer_mails';
            $this->db->update(
                    $table,
                    array(
                        'title' => $title,
                        'name' => $name,
                        'surname' => $surname,
                        'email' => $email,
                        'cat_id' => $cat_id,
                        'datetime_update' => $this->dnt->datetime()
                    ),
                    array(
                        'id_entity' => $post_id,
                        '`vendor_id`' => $this->vendor->getId())
            );
            $this->dnt->redirect($return);
        } else {
            $this->dnt->redirect(WWW_PATH_ADMIN_2 . '?src=' . DEFAULT_MODUL_ADMIN);
        }
    }

    public function showHideAction()
    {
        $post_id = $this->rest->get('post_id');
        $query = "SELECT `show` FROM dnt_mailer_mails WHERE id_entity = '" . $post_id . "' AND vendor_id = '" . Vendor::getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $show = $row['show'];
            }
        }

        if ($show == 0) {
            $set_show = 1;
        } elseif ($show == 1) {
            $set_show = 2;
        } else {
            $set_show = 0;
        }
        $table = 'dnt_mailer_mails';
        $this->db->update(
                $table,
                array(
                    'show' => $set_show,
                ),
                array(
                    'id_entity' => $post_id,
                    'vendor_id' => $this->vendor->getId(),
                )
        );
        $this->dnt->redirect(WWW_PATH_ADMIN_2 . 'index.php?src=' . $this->rest->get('src') . '&included=' . $this->rest->get('included') . '&filter=' . $this->rest->get('filter') . '&page=' . $this->rest->get('page'));
    }

    public function delMailAction()
    {
        $where = array('id_entity' => $this->rest->get('post_id'), 'vendor_id' => $this->vendor->getId());
        $this->db->delete('dnt_mailer_mails', $where, 1);
        $this->dnt->redirect(WWW_PATH_ADMIN_2 . '?src=mailer&filter=' . $this->rest->get('filter'));
    }

    protected function replaceTitle($title, $content)
    {
        $title = str_replace('Pán', 'Vážený pán', $title);
        $title = str_replace('Pani', 'Vážená pani', $title);
        $content = str_replace('Vážení klienti, milí priatelia', $title, $content);
        $title = str_replace('Vážený pán', 'Dear Mr.', $title);
        $title = str_replace('Vážená pani', 'Dear Mrs.', $title);
        return $title;
    }

    protected function sentMail($currentID, $lastId, $catId, $data, $countMails, $hasData, $sendedMails)
    {
        if ($hasData) {
            foreach ($data as $recipient) {

                $emails[] = $recipient['email'];

                $sender_email = str_replace(" ", "", $recipient['email']);
                $msg = $this->session->get('message');
                $template = $this->session->get('template');
                $subject = $this->session->get('subject');
                $content = $this->session->get('content');

                $this->mailer->set_recipient(array($sender_email));

                //KLIENTI MARKIZA JAR 2019
                $title = $recipient['title'] . ' ' . $recipient['name'] . ' ' . $recipient['surname'];
                $title = $this->replaceTitle($title, $content);

                $content = str_replace('Dear clients, dear friends', $title, $content);
                $content = str_replace('RECIPIENT_EMAIL_HEX', $this->dnt->strToHex($recipient['email']), $content);

                $this->mailer->set_msg($content);
                $this->mailer->set_subject($subject);
                $this->mailer->set_sender_name(false);
                $this->mailer->sent_email();
            }
            $data['toFinish'] = ($countMails - $sendedMails);
            $data['currentID'] = $currentID;
            $data['lastId'] = $lastId;
            $data['countMails'] = $countMails;
            $data['emails'] = join('<br/>', $emails);
            $data['sleep'] = $this->sleep;

            $this->loadTemplate($this->loc, 'sendingMails', $data);
        } else {
            $data['countMails'] = $countMails;
            $this->loadTemplate($this->loc, 'sendingFinish', $data);
        }
    }

    public function sentMailAction()
    {
        $table = 'dnt_mailer_mails';

        if ($this->hasPost('sent')) {
            $subject = $this->rest->post('subject');
            $cat_id = $this->rest->post('users');

            if ($this->rest->post('template') != '') {
                $content = $this->rest->post('template');
            }
            if ($this->rest->post('url_external') != '') {
                $content = file_get_contents($this->rest->post('url_external'));
            }
            if ($this->rest->post('message') != '') {
                $content = $this->rest->post('message');
            }

            $this->session->set('content', $content);
            $this->session->set('cat_id', $cat_id);
            $this->session->set('subject', $subject);
        }
        $cat_id = $this->session->get('cat_id');

        /** COUNT ALL MAILS TO SENT * */
        $queryCount = "SELECT * FROM " . $table . " WHERE cat_id = '" . $cat_id . "' AND vendor_id = '" . Vendor::getId() . "'  AND `show` = 1 ORDER BY `id_entity` ASC";
        $countMails = $this->db->num_rows($queryCount);



        if (isset($_GET['mail_id'])) {
            $currentID = $this->rest->get('mail_id');

            $queryMailId = "SELECT * FROM " . $table . " WHERE cat_id = '" . $cat_id . "' AND vendor_id = '" . Vendor::getId() . "'  AND `show` = 1 AND `id_entity` > '" . $currentID . "' ORDER BY `id_entity` asc LIMIT " . $this->sentMailPerRequest . "";
            $data = $this->db->get_results($queryMailId);
        } else {
            $currentID = $this->dnt->db_current_id($table, "AND cat_id = '" . $cat_id . "'  AND `show` = 1");
            $query = "SELECT * FROM " . $table . " WHERE cat_id = '" . $cat_id . "' AND vendor_id = '" . Vendor::getId() . "'  AND `show` = 1 AND `id_entity` >= '" . $currentID . "' ORDER BY `id_entity` asc LIMIT " . $this->sentMailPerRequest . "";
            $data = $this->db->get_results($query);
        }

        if (isset($data[0]['id_entity'])) {
            $lastId = end($data)['id_entity'];
            $hasData = 1;
        } else {
            $lastId = 0;
            $hasData = 0;
        }

        $queryCountSend = "SELECT * FROM " . $table . " WHERE cat_id = '" . $cat_id . "' AND vendor_id = '" . Vendor::getId() . "' AND id_entity <= '$lastId'  AND `show` = 1";
        $sendedMails = $this->db->num_rows($queryCountSend);

        $this->sentMail($currentID, $lastId, $cat_id, $data, $countMails, $hasData, $sendedMails);
    }

}
