<?php

namespace App;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;

class Subscriber
{
    protected $db;

    protected $rest;

    public $isSubsscriber;

    protected $dnt;

    protected $settings;

    public function __construct()
    {
        $this->db = new DB();
        $this->rest = new Rest();
        $this->dnt = new Dnt();
        $this->settings = new Settings();
        $this->vendor = new Vendor();
    }

    public function generateUrl($id_entity, $email, $status, $domain = false)
    {
        $finalDomain = ($domain) ? $domain . '?plugin=subscriber' : WWW_PATH . 'subscriber/?plugin=subscriber';
        $url = '&id=' . $this->dnt->strToHex(urlencode(base64_encode($email))) . '&vendorId=' . $this->dnt->strToHex(urlencode(base64_encode($this->vendor->getId()))) . '&status=' . $this->dnt->strToHex(urlencode(base64_encode($status))) . '&idEntity=' . $this->dnt->strToHex(urlencode(base64_encode($id_entity)));
        return $finalDomain . $url;
    }

    public function seenImage($campainId, $email, $fullImage = false)
    {
        $emailHex = $this->dnt->strToHex($email);
        $imageUrl = WWW_PATH . 'dnt-api/analytics-newsletters?systemStatus=newsletter_log_seen&campainId=' . $campainId . '&email=' . $emailHex;
        if ($fullImage) {
            return '<img src="' . $imageUrl . '" alt="logo" class="dnt3-stat-logo" width="1" height="1" border="0" style="height:1px!important;width:1px!important;border-width:0!important;margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding-top:0!important;padding-bottom:0!important;padding-right:0!important;padding-left:0!important;float:left;" />';
        } else {
            return $imageUrl;
        }
    }

    protected function allowReferers($cutomReferers = false)
    {

        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : false;
        if (is_array($cutomReferers)) {
            $this->allowReferers = $cutomReferers;
        } else {
            $this->allowReferers = array(
                'localhost',
            );
        }
        foreach ($this->allowReferers as $singlReferer) {
            if ($this->dnt->in_string($singlReferer, $referer)) {
                return true;
            }
        }
        return false;
    }

    public function requestValidator($cutomReferers)
    {

        if (isset($this->settings->getGlobals()->vendor['apiKey'])) {
            $apiKey = (string) $this->settings->getGlobals()->vendor['apiKey'];
        } else {
            $apiKey = false;
        }

        if ($this->allowReferers($cutomReferers)) {
            $this->valid = 1;
        } elseif ($this->dnt->in_string('localhosst', SERVER_NAME)) {
            $this->valid = 1;
        } elseif ($this->rest->get('api-key') && ($this->rest->get('api-key') == $apiKey)) {
            $this->valid = 1;
        } else {
            $this->valid = 0;
        }
    }

    public function getData()
    {
        $this->email = base64_decode(urldecode($this->dnt->hexToStr($this->rest->get('id'))));
        $this->vendor_id = base64_decode(urldecode($this->dnt->hexToStr($this->rest->get('vendorId'))));
        $this->status = base64_decode(urldecode($this->dnt->hexToStr($this->rest->get('status'))));
        $this->id_entity = base64_decode(urldecode($this->dnt->hexToStr($this->rest->get('idEntity'))));
    }

    public function update()
    {
        if (($this->status == 1 || $this->status == 0) && $this->valid) {
            $this->db->update(
                'dnt_mailer_mails',
                array(
                        'show' => $this->status,
                    ),
                array(
                        'vendor_id' => $this->vendor_id,
                        'email' => $this->email,
                        'id_entity' => $this->id_entity,
                    )
            );
        }
        $this->isSubsscriber = ($this->status == 1) ? 1 : 0;
    }

    public function jsonResponse()
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        $json = json_encode([
            'status' => $this->isSubsscriber,
            'valid' => $this->valid,
            'email' => $this->email,
            'id_entity' => $this->id_entity,
            'vendor_id' => $this->vendor_id,
        ]);
        print $json;
    }
}
