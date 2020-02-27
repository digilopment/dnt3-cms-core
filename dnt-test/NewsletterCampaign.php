<?php

class NewsletterCampaignTest
{

    protected $campaignId = 'newsletter-spring-2020';
    protected $mailerCategory = 25;
    protected $emailCatId;
    protected $db;
    protected $vendor;
    protected $rawLogs;
    protected $logs;
    protected $sentEmails;

    public function __construct()
    {
        $this->db = new DB();
        $this->rest = new Rest();
        $this->vendor = new Vendor();
    }

    protected function init()
    {
        $this->query();
        $this->getLogs();
        $this->emailCatId = $this->rest->get('emailCatId');
        $this->sentEmails();
        $this->getTemplate();
    }

    protected function query()
    {
        $query = ("SELECT * FROM `dnt_logs` WHERE `system_status` = 'newsletter_log_click' AND vendor_id = '" . $this->vendor->getId() . "'");
        if ($this->db->num_rows($query) > 0) {
            $this->rawLogs = $this->db->get_results($query, true);
        }
    }

    protected function sentEmails()
    {
        $query = "SELECT * FROM `dnt_mailer_mails` WHERE  `vendor_id` = '" . $this->vendor->getId() . "' AND cat_id = '" . $this->emailCatId . "' ORDER BY `name` ASC";
        if ($this->db->num_rows($query) > 0) {
            $this->sentEmails = $this->db->get_results($query, true);
        }
    }

    protected function getLogs()
    {
        $logs = [];
        foreach ($this->rawLogs as $log) {
            if (isset(json_decode($log->msg)->campainId) && json_decode($log->msg)->campainId == $this->campaignId) {
                $logs[] = $log;
            }
        }
        $this->logs = $logs;
    }

    protected function getLogByEmail($email)
    {
        $logs = [];
        foreach ($this->logs as $log) {
            if (isset(json_decode($log->msg)->email) && json_decode($log->msg)->email == $email) {
                $logs[] = $log;
            }
        }
        return $logs;
    }

    protected function openedEmail()
    {
        $i = 0;
        foreach ($this->sentEmails as $email) {
            if($this->getLogByEmail($email->email)){
                $i++;
            }
        }
        return $i;
    }

    protected function getTemplate()
    {
        $data['sentEmails'] = $this->sentEmails;
        $data['baseUrl'] = 'http://85.248.116.69/dnt-markiza/dnt-srv/otazky-a-odpovede/';
        $data['logByEmail'] = function($email) {
            return $this->getLogByEmail($email);
        };
        $data['countMails'] = count($this->sentEmails);
        $data['countOpenedMails'] = $this->openedEmail();
        $data['percentage'] = round($data['countOpenedMails']/$data['countMails']*100, 2);
        $data['countClicks'] = function($email) {
            return count($this->getLogByEmail($email));
        };
        require 'templates/newsletterCampaign.php';
    }

    public function run()
    {
        $this->init();
        //var_dump($this->getLogByEmail('u0000u0000'));
        //var_dump($this->logs);
    }

}
