<?php

namespace DntTest;

use DntLibrary\Base\DB;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\Dnt;

class NewsletterCampaignTest
{

    protected $campaignId = 'newsletter-spring-2020';
    protected $emailCatId;
    protected $db;
    protected $dnt;
    protected $vendor;
    protected $logs = [];
    protected $sentEmails = [];
    protected $seenLogs = [];
    protected $uniqueClick = 0;
    protected $uniqueSeen = 0;
    protected $showUsers = true;

    public function __construct()
    {
        $this->db = new DB();
        $this->rest = new Rest();
        $this->vendor = new Vendor();
        $this->dnt = new Dnt();
    }

    protected function setCampaignId()
    {
        if ($this->rest->get('campaignId')) {
            $this->campaignId = $this->rest->get('campaignId');
        }
    }

    protected function init()
    {
        $this->emailCatId = $this->rest->get('emailCatId');
        $this->setCampaignId();
        $this->getSeenLogs();
        $this->getClickLogs();
        $this->getLogs();
        $this->sentEmails();
        $this->getClikedUrls();
        $this->countMailsInCampaing();
        $this->setUniqueData();
        $this->getTemplate();
        $this->showUsers();
    }

    protected function getSeenLogs()
    {
        $logs = [];
        /* $query = "SELECT * FROM `dnt_logs` WHERE 
          `system_status` = 'newsletter_log_seen'
          AND `msg` LIKE '%" . $this->campaignId . "%'
          AND vendor_id = '" . $this->vendor->getId() . "' AND `REMOTE_ADDR` <> '54.71.187.124'";
          //GROUP BY timestamp"; */
        $query = "SELECT * FROM `dnt_logs` WHERE `system_status` = 'newsletter_log_seen' AND `msg` LIKE '%" . $this->campaignId . "%' AND vendor_id = '" . $this->vendor->getId() . "'";
        $this->countSeenLogs = $this->db->num_rows($query);
        if ($this->countSeenLogs > 0) {
            $logs = $this->db->get_results($query, true);
        }
        $this->seenLogs = $logs;
    }

    protected function getClickLogs()
    {
        $logs = [];
        /* $query = "SELECT * FROM `dnt_logs` WHERE 
          `system_status` = 'newsletter_log_click' AND ( (`HTTP_ACCEPT` LIKE '%text%' or `HTTP_ACCEPT` LIKE '%image%' or `HTTP_ACCEPT` LIKE '%xml%' or `HTTP_ACCEPT` LIKE '%html%') AND `HTTP_ACCEPT_LANGUAGE` <> '' AND `REMOTE_ADDR` <> '54.71.187.124')
          AND `msg` LIKE '%" . $this->campaignId . "%'
          AND vendor_id = '" . $this->vendor->getId() . "'";
          //GROUP BY timestamp"; */
        $query = "SELECT * FROM `dnt_logs` WHERE `system_status` = 'newsletter_log_click' AND `msg` LIKE '%" . $this->campaignId . "%' AND vendor_id = '" . $this->vendor->getId() . "'";
        $this->countClickLogs = $this->db->num_rows($query);
        if ($this->countClickLogs > 0) {
            $this->clickLogs = $this->db->get_results($query, true);
        }
    }

    protected function getLogs()
    {
        $logs = [];
        /* $query = "SELECT * FROM `dnt_logs` WHERE 
          (`system_status` = 'newsletter_log_seen' OR
          (`system_status` = 'newsletter_log_click' AND ( (`HTTP_ACCEPT` LIKE '%text%' or `HTTP_ACCEPT` LIKE '%image%' or `HTTP_ACCEPT` LIKE '%xml%' or `HTTP_ACCEPT` LIKE '%html%') AND `HTTP_ACCEPT_LANGUAGE` <> '' AND `REMOTE_ADDR` <> '54.71.187.124')))
          AND `msg` LIKE '%" . $this->campaignId . "%'
          AND vendor_id = '" . $this->vendor->getId() . "'"; */
        $query = "SELECT * FROM `dnt_logs` WHERE (`system_status` = 'newsletter_log_seen' OR `system_status` = 'newsletter_log_click') AND `msg` LIKE '%" . $this->campaignId . "%' AND vendor_id = '" . $this->vendor->getId() . "'";
        $this->countLogs = $this->db->num_rows($query);
        if ($this->countLogs > 0) {
            $logs = $this->db->get_results($query, true);
        }
        $this->logs = $logs;
    }

    protected function sentEmails()
    {
        $query = "SELECT * FROM `dnt_mailer_mails` WHERE  `vendor_id` = '" . $this->vendor->getId() . "'  AND  cat_id = '" . $this->emailCatId . "' ORDER BY `show` DESC, `name` ASC";
        $this->countAllEmails = $this->db->num_rows($query);
        if ($this->countAllEmails > 0) {
            $this->sentEmails = $this->db->get_results($query, true);
        }
    }

    protected function countMailsInCampaing()
    {
        $this->countSentEmails = 0;
        $query = "SELECT * FROM `dnt_mailer_mails` WHERE  `vendor_id` = '" . $this->vendor->getId() . "'  AND  cat_id = '" . $this->emailCatId . "' AND `show` = 1";
        $this->countSentEmails = $this->db->num_rows($query);
    }

    protected function getClikedUrls()
    {
        $url = [];
        foreach ($this->clickLogs as $log) {
            $link = json_decode($log->msg)->redirectTo;
            $checkDnt3 = explode('dnt3ClickId', $link);
            if (isset($checkDnt3[1])) {
                $link = substr_replace($checkDnt3[0], "", -1);
            }
            $url[] = $link;
        }
        $countLogout = 0;
        $countDefault = 0;
        $countLogoutUnique = 0;

        $countLinks = array_count_values($url);
        $final['logout'] = [];
        $final['default'] = [];
        foreach ($countLinks as $link => $count) {
            $checkDnt3 = explode('dnt3ClickId', $link);
            if (isset($checkDnt3[1])) {
                $link = substr_replace($checkDnt3[0], "", -1);
            }
            if ($this->dnt->in_string('plugin=subscriber', $link)) {
                $email = base64_decode(urldecode($this->dnt->HexToStr(explode('&', explode('id=', $link)[1])[0])));
                $final['logout'][$email] = (int) $count;
                $countLogout += $count;
                $countLogoutUnique ++;
            } else {
                if (!empty($link)) {
                    $final['default'][$link] = (int) $count;
                    $countDefault += $count;
                }
            }
        }
        $this->countLogoutedUrl = $countLogout;
        $this->countLogoutedUrlUnique = $countLogoutUnique;
        $this->countDefaultUrl = $countDefault;
        $this->clickedUrls = $final;
    }

    protected function getLogByEmail($email)
    {
        $logs = [];
        foreach ($this->logs as $log) {
            if ($this->dnt->in_string(strtolower($email), strtolower($log->msg))) {
                $logs[] = $log;
            }
        }
        return $logs;
    }

    protected function setLogData()
    {
        $data = [];
        foreach ($this->logs as $log) {
            $email = isset(json_decode($log->msg)->email) ? json_decode($log->msg)->email : false;
            $logsByEmail = $this->getLogByEmail($email);
            $click = 0;
            foreach ($logsByEmail as $log) {
                if (isset(json_decode($log->msg)->redirectTo) && $log->system_status == 'newsletter_log_click') {
                    $click++;
                }
            }
            $data[$email] = [
                'seen' => 1,
                'logs' => $logsByEmail,
                'clicked' => function() use ($click) {
                    if ($click > 0) {
                        return 'ÁNO';
                    } else {
                        return 'NIE';
                    }
                },
                'countClick' => function() use ($click) {
                    return $click;
                },
            ];
        }
        return $data;
    }

    protected function setLogClickData()
    {
        $data = [];
        foreach ($this->clickLogs as $log) {
            $email = isset(json_decode($log->msg)->email) ? json_decode($log->msg)->email : false;
            $logsByEmail = $this->getLogByEmail($email);
            $click = 0;
            foreach ($logsByEmail as $log) {
                if (isset(json_decode($log->msg)->redirectTo) && $log->system_status == 'newsletter_log_click') {
                    $click++;
                }
            }
            $data[$email] = [
                'seen' => 1,
                'logs' => $logsByEmail,
                'clicked' => function() use ($click) {
                    if ($click > 0) {
                        return 'ÁNO';
                    } else {
                        return 'NIE';
                    }
                },
                'countClick' => function() use ($click) {
                    return $click;
                },
            ];
        }
        return $data;
    }

    protected function setLogSeenData()
    {
        $data = [];
        foreach ($this->seenLogs as $log) {
            $email = isset(json_decode($log->msg)->email) ? json_decode($log->msg)->email : false;
            $logsByEmail = $this->getLogByEmail($email);
            $click = 0;
            foreach ($logsByEmail as $log) {
                if (isset(json_decode($log->msg)->redirectTo) && $log->system_status == 'newsletter_log_seen') {
                    $click++;
                }
            }
            $data[$email] = [
                'seen' => 1,
                'logs' => $logsByEmail,
                'clicked' => function() use ($click) {
                    if ($click > 0) {
                        return 'ÁNO';
                    } else {
                        return 'NIE';
                    }
                },
                'countClick' => function() use ($click) {
                    return $click;
                },
            ];
        }
        return $data;
    }

    protected function setUniqueData()
    {
        $dataUniqueClicked = [];
        $dataUniqueSeen = [];
        foreach ($this->clickLogs as $log) {
            if (isset(json_decode($log->msg)->redirectTo) && $log->system_status == 'newsletter_log_click') {
                $email = isset(json_decode($log->msg)->email) ? json_decode($log->msg)->email : false;
                $dataUniqueClicked[$email] = $log;
            }
        }
        foreach ($this->seenLogs as $log) {
            if (isset(json_decode($log->msg)->redirectTo) && $log->system_status == 'newsletter_log_seen') {
                $email = isset(json_decode($log->msg)->email) ? json_decode($log->msg)->email : false;
                $dataUniqueSeen[$email] = 1;
            }
        }

        $this->uniqueClick = count($dataUniqueClicked);
        $this->uniqueSeen = count($dataUniqueSeen);
    }

    protected function showUsers()
    {
        if ($this->rest->get('showUsers') && $this->rest->get('showUsers') == 0) {
            $this->showUsers = false;
        }
    }

    protected function getTemplate()
    {

        $data['setLogData'] = $this->setLogData();
        $data['setLogSeenData'] = $this->setLogSeenData();
        $data['setLogClickData'] = $this->setLogClickData();
        $data['sentEmails'] = $this->sentEmails;
        $data['baseUrl'] = 'https://varenypeceny.markiza.sk/dnt-markiza/forms/';
        $data['dnt'] = $this->dnt;
        $data['datetime'] = $this->dnt->datetime();
        $data['campaignId'] = $this->rest->get('campaignId');

        //COUNT MAILS
        if ($this->rest->get('countMails')) {
            $data['countMails'] = $this->rest->get('countMails');
        } else {
            $data['countMails'] = ($this->countSentEmails + $this->countLogoutedUrlUnique > $this->countAllEmails) ? $this->countAllEmails : $this->countSentEmails + $this->countLogoutedUrlUnique;
        }

        //DELIVERED
        $data['countDelivered'] = $this->rest->get('delivered');
        $data['deliveredPercentage'] = $data['countDelivered'] > 0 ? round($data['countDelivered'] / $data['countMails'] * 100, 2) : 0;

        //CLICKED
        $data['countClickedEmails'] = $this->countClickLogs;
        $data['clickedPercentage'] = $data['countMails'] > 0 ? round($data['countClickedEmails'] / $data['countMails'] * 100, 2) : 0;

        //CLICKED UNIQUE
        $data['countClickedUnique'] = $this->uniqueClick;
        $data['clickedPercentageUnique'] = $data['countMails'] > 0 ? round($data['countClickedUnique'] / $data['countMails'] * 100, 2) : 0;

        //SEEN
        $data['countSeenEmails'] = $this->countSeenLogs;
        $data['seenPercentage'] = $data['countMails'] > 0 ? round($data['countSeenEmails'] / $data['countMails'] * 100, 2) : 0;

        //SEEN UNIQUE
        $data['countSeenUnique'] = $this->uniqueSeen;
        $data['seenUniquePercentage'] = $data['countMails'] > 0 ? round($data['countSeenUnique'] / $data['countMails'] * 100, 2) : 0;

        //URL COUNTER
        $data['urlCounter'] = $this->clickedUrls;

        //COUNT DEFAULT URL
        $data['countDefaultUrl'] = $this->countDefaultUrl;
        $data['percentageDefaultUrl'] = $data['countMails'] > 0 ? round($data['countDefaultUrl'] / $data['countMails'] * 100, 2) : 0;

        //COUNT LOGOUT URL
        $data['countLogoutedUrlUnique'] = $this->countLogoutedUrlUnique;
        $data['percentageLogoutedUrl'] = $data['countMails'] > 0 ? round($data['countLogoutedUrlUnique'] / $data['countMails'] * 100, 2) : 0;

        $data['showUsers'] = $this->showUsers;
        if ($this->rest->get('layout') == 'preview') {
            require 'templates/newsletterCampaignPreview.php';
        } else {
            require 'templates/newsletterCampaign.php';
        }
    }

    public function run()
    {
        $this->init();
    }

}
