<?php

namespace DntAdmin\Moduls;

use App\Subscriber;
use DntAdmin\App\AdminController;
use DntLibrary\Base\AdminMailer;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Mailer;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Settings;
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
    protected $subscriber;
    protected $settings;

    public function __construct()
    {
        $this->db = new DB();
        $this->rest = new Rest();
        $this->adminMailer = new AdminMailer();
        $this->dnt = new Dnt();
        $this->vendor = new Vendor();
        $this->session = new Sessions();
        $this->mailer = new Mailer();
        $this->subscriber = new Subscriber();
        $this->settings = new Settings();
    }

    protected function categories()
    {
        $query = $this->adminMailer->catQuery();
        if ($this->db->num_rows($query) > 0) {
            $this->categories = $this->db->get_results($query);
        }
    }

    protected function setMailPerRequest()
    {
        $this->sentMailPerRequest = isset($this->settings->getGlobals()->vendor['sentMailPerRequest']) ? $this->settings->getGlobals()->vendor['sentMailPerRequest'] : $this->sentMailPerRequest;
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
        //$this->setMailPerRequest();
        //$this->categories();
        //$this->mailerQuery();
    }

    public function indexAction()
    {
        $this->session->set('sended-mails', 0);
        $this->session->set('count-mails', 0);
        $this->mailerQuery();
        $this->categories();
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
            $this->dnt->redirect();
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
        $this->dnt->redirect();
    }

    public function delMailAction()
    {
        $where = array('id_entity' => $this->rest->get('post_id'), 'vendor_id' => $this->vendor->getId());
        $this->db->delete('dnt_mailer_mails', $where, 1);
        $this->dnt->redirect();
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

    protected function contentConfigurator($content, $recipient)
    {
        $this->replacedcontent = false;
        $this->replacedcontent = str_replace('RECIPIENT_EMAIL_HEX', $this->dnt->strToHex($recipient['email']), $content);
        $domain = $this->settings->getGlobals()->vendor['unsubscribeDomain'] ?? false;
        $logoutUrl = $this->subscriber->generateUrl($recipient['id_entity'], $recipient['email'], 0, $domain);
        $this->replacedcontent = str_replace('<url=UNSUBSCRIBE_URL=>', $logoutUrl, $this->replacedcontent);
        $this->replacedcontent = $this->dnt->minify($this->replacedcontent);
        return $this->replacedcontent;
    }

    protected function checkClick($content, $recipient, $campainId)
    {
        $search = [];
        $replace = [];
        $res = [];
        $hexEmail = $this->dnt->strToHex($recipient['email']);
        $targetUrl = WWW_PATH . 'dnt-api/analytics-newsletters?systemStatus=newsletter_log_click&campainId=' . $campainId . '&email=' . $hexEmail . '&url=';
        preg_match_all("/<a.*?href\s*=\s*['\"](.*?)['\"]/", $content, $res);
        foreach ($res[1] as $item) {
            $search[] = $item;
            $replace[] = $targetUrl . urlencode($item);
        }
        return str_replace($search, $replace, $content);
    }

    protected function checkSeen($content, $recipient, $campainId)
    {
        $image = $this->subscriber->seenImage($campainId, $recipient['email'], true);
        return str_replace('</body>', $image . '</body>', $content);
    }

    protected function sentMail($currentID, $lastId, $catId, $recipients, $countMails, $hasData, $sendedMails)
    {

        $data['mailingReportUrl'] = WWW_PATH . 'dnt-test/newsletter-campaign?emailCatId=' . $catId . 'countMails=' . $countMails . 'delivered=' . $sendedMails . '&campaignId=' . $this->session->get('campain');
        if ($hasData) {
            foreach ($recipients as $recipient) {

                $msg = $this->session->get('message');
                $template = $this->session->get('template');
                $subject = $this->session->get('subject');
                $content = $this->session->get('content');
                $campain = $this->session->get('campain');

                $senderName = $this->session->get('senderName');
                $senderEmail = $this->session->get('senderEmail');

                $emails[] = $recipient['email'];

                $sender_email = str_replace(' ', '', $recipient['email']);

                $this->mailer->set_recipient(array($sender_email));

                //KLIENTI MARKIZA JAR 2019
                $title = $recipient['title'] . ' ' . $recipient['name'] . ' ' . $recipient['surname'];
                $title = $this->replaceTitle($title, $content);
                $content = str_replace('Dear clients, dear friends', $title, $content);

                //content configurator
                $content = $this->contentConfigurator($content, $recipient);


                //set click - replace all href
                $content = $this->checkClick($content, $recipient, $campain);

                //set seen - add 1px image
                $content = $this->checkSeen($content, $recipient, $campain);

                $this->mailer->set_msg($content);
                $this->mailer->set_subject($subject);
                $this->mailer->set_sender_name($senderName);
                $this->mailer->set_sender_email($senderEmail);
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
        $this->setMailPerRequest();
        $table = 'dnt_mailer_mails';

        $sended = $this->session->get('sended-mails');

        if ($this->hasPost('sent')) {
            $subject = $this->rest->post('subject');
            $cat_id = $this->rest->post('users');
            $senderName = $this->rest->post('senderName');
            $senderEmail = $this->rest->post('senderEmail');

            if ($this->rest->post('template') != '') {
                $content = $this->rest->post('template');
            }
            if ($this->rest->post('url_external') != '') {
                $content = file_get_contents($this->rest->post('url_external'));
            }
            if ($this->rest->post('message') != '') {
                $content = $this->rest->post('message');
            }
            if ($this->rest->post('campain') != '') {
                $campain = $this->rest->post('campain');
            } else {
                $campain = $this->dnt->get_rok() . '-' . $this->dnt->get_mesiac() . '-' . $this->dnt->get_den();
            }

            $this->session->set('content', $content);
            $this->session->set('cat_id', $cat_id);
            $this->session->set('subject', $subject);
            $this->session->set('campain', $campain);
            $this->session->set('senderName', $senderName);
            $this->session->set('senderEmail', $senderEmail);
        }
        $cat_id = $this->session->get('cat_id');
        /** COUNT ALL MAILS TO SENT * */
        if ($this->session->get('count-mails')) {
            $countMails = $this->session->get('count-mails');
        } else {
            $queryCount = "SELECT COUNT(id_entity) AS `countMails` FROM " . $table . " WHERE cat_id = '" . $cat_id . "' AND vendor_id = '" . Vendor::getId() . "'  AND `show` = 1";
            $result = $this->db->get_results($queryCount);
            $countMails = (int) $result[0]['countMails'];
            $this->session->set('count-mails', $countMails);
        }

        if (isset($_GET['mail_id'])) {
            $currentID = $this->rest->get('mail_id');
            $queryMailId = "SELECT * FROM " . $table . " WHERE cat_id = '" . $cat_id . "' AND vendor_id = '" . Vendor::getId() . "'  AND `show` = 1 AND `id_entity` > '" . $currentID . "' ORDER BY `id_entity` asc LIMIT " . $this->sentMailPerRequest . "";
            $data = $this->db->get_results($queryMailId);
            $requestSended = count($data);
        } else {
            $currentID = $this->dnt->db_current_id($table, "AND cat_id = '" . $cat_id . "'  AND `show` = 1");
            $query = "SELECT * FROM " . $table . " WHERE cat_id = '" . $cat_id . "' AND vendor_id = '" . Vendor::getId() . "'  AND `show` = 1 AND `id_entity` >= '" . $currentID . "' ORDER BY `id_entity` asc LIMIT " . $this->sentMailPerRequest . "";
            $data = $this->db->get_results($query);
            $requestSended = count($data);
        }

        if (isset($data[0]['id_entity'])) {
            $lastId = end($data)['id_entity'];
            $hasData = 1;
        } else {
            $lastId = 0;
            $hasData = 0;
        }

        $newSendedMails = $sended + $requestSended;
        $this->session->set('sended-mails', $newSendedMails);
        $this->sentMail($currentID, $lastId, $cat_id, $data, $countMails, $hasData, $newSendedMails);
    }

}
