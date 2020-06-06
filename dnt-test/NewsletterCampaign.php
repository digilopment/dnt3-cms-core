<?php

namespace DntTest;

use DntLibrary\Base\DB;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class NewsletterCampaignTest
{

    protected $campaignId = 'newsletter-spring-2020';
    protected $emailCatId;
    protected $db;
    protected $vendor;
    protected $rawLogs = [];
    protected $logs = [];
    protected $sentEmails = [];
    protected $seenLogs = [];
    protected $rawSeenLogs = [];

    public function __construct()
    {
        $this->db = new DB();
        $this->rest = new Rest();
        $this->vendor = new Vendor();
    }

    protected function setCampaignId()
    {
        if ($this->rest->get('campaignId')) {
            $this->campaignId = $this->rest->get('campaignId');
        }
    }

    protected function init()
    {
        $this->setCampaignId();
        $this->seenQuery();
        $this->getSeenLogs();
        $this->clickQuery();
        $this->getLogs();
        $this->emailCatId = $this->rest->get('emailCatId');
        $this->sentEmails();
        $this->getTemplate();
    }

    /** SEEN LOGS * */
    protected function seenQuery()
    {
        $query = ("SELECT * FROM `dnt_logs` WHERE `system_status` = 'newsletter_log_seen' AND vendor_id = '" . $this->vendor->getId() . "'");
        if ($this->db->num_rows($query) > 0) {
            $this->rawSeenLogs = $this->db->get_results($query, true);
        }
    }

    protected function getSeenLogs()
    {
        $logs = [];
        foreach ($this->rawSeenLogs as $log) {
            if (isset(json_decode($log->msg)->campainId) && json_decode($log->msg)->campainId == $this->campaignId) {
                $logs[] = $log;
            }
        }
        $this->seenLogs = $logs;
    }

    protected function getSeenLogByEmail($email)
    {
        $logs = [];
        foreach ($this->seenLogs as $log) {
            if (isset(json_decode($log->msg)->email) && json_decode($log->msg)->email == $email) {
                $logs[] = $log;
            }
        }
        return $logs;
    }

    protected function seenEmails()
    {
        $i = 0;
        foreach ($this->sentEmails as $email) {
            if ($this->getSeenLogByEmail($email->email) || $this->getLogByEmail($email->email)) {
                $i++;
            }
        }
        return $i;
    }

    protected function clickQuery()
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

    protected function clickedEmails()
    {
        $i = 0;
        foreach ($this->sentEmails as $email) {
            if ($this->getLogByEmail($email->email)) {
                $i++;
            }
        }
        return $i;
    }

    protected function getTemplate()
    {
        $data['sentEmails'] = $this->sentEmails;
        $data['baseUrl'] = 'http://85.248.116.69/dnt-markiza/forms/';
        $data['logByEmail'] = function($email) {
            return $this->getLogByEmail($email);
        };
        $data['click'] = function($email) {
            $click = 0;
            foreach ($this->getLogByEmail($email) as $email) {
                if (isset(json_decode($email->msg)->redirectTo)) {
                    $click++;
                }
            }
            return $click;
        };
        $data['seen'] = function($email) {
            $seen = 0;
            foreach ($this->getSeenLogByEmail($email) as $email) {
                if (isset(json_decode($email->msg)->email)) {
                    $seen++;
                }
            }
            return $seen;
        };
        $data['log'] = function ($email, $object) {
            if (isset($this->getLogByEmail($email)[0]->$object)) {
                return $this->getLogByEmail($email)[0]->$object;
            }
            return false;
        };
        $data['countMails'] = count($this->sentEmails);

        //CLICKED
        $data['countClickedEmails'] = $this->clickedEmails();
        $data['clickedPercentage'] = $data['countMails'] > 0 ? round($data['countClickedEmails'] / $data['countMails'] * 100, 2) : 0;
        $data['countClicks'] = function($email) {
            return count($this->getLogByEmail($email));
        };

        //SEEN
        $data['countSeenEmails'] = $this->seenEmails();
        $data['seenPercentage'] = $data['countMails'] > 0 ? round($data['countSeenEmails'] / $data['countMails'] * 100, 2) : 0;
        $data['countSeens'] = function($email) {
            return count($this->getSeenLogByEmail($email));
        };
        require 'templates/newsletterCampaign.php';
    }

    public function run()
    {
        $this->init();
    }

}
