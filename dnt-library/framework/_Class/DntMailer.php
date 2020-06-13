<?php

/**
 *  class       Mailer
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\Dnt;
use DntLibrary\Base\Settings;

class Mailer
{

    public $recipient; //array
    public $sender_email; //string
    public $sender_name; //string
    public $title; //string
    public $msg; //string
    public $subject; //string
    public $response;

    /**
     * 
     * @return boolean
     */
    public function __construct()
    {
        return false;
    }

    /**
     * 
     * @param type $arr
     */
    public function set_recipient($arr)
    {
        $this->recipient = $arr;
    }

    /**
     * 
     * @param type $str
     */
    public function set_sender_email($str)
    {
        $this->sender_email = $str;
    }

    /**
     * 
     * @param type $str
     */
    public function set_sender_name($str)
    {
        $this->sender_name = $str;
    }

    /**
     * 
     * @param type $str
     */
    public function set_title($str)
    {
        $this->title = $str;
    }

    /**
     * 
     * @param type $str
     */
    public function set_msg($str)
    {
        $this->msg = $str;
    }

    /**
     * 
     * @param type $str
     */
    public function set_subject($str)
    {
        $this->subject = $str;
    }

    /**
     * 
     * @param type $to
     */
    public function prepare_mail($to)
    {

        //SENDER
        if ($this->sender_email == false) {
            $od_email = Settings::get("vendor_email");
        } else {
            $od_email = $this->sender_email;
        }

        //PREDMET
        if ($this->subject == false) {
            $predmet = "(no subject)";
        } else {
            if (SEND_EMAIL_VIA == "internal") {
                $predmet = Dnt::odstran_diakritiku($this->subject);
            } elseif (SEND_EMAIL_VIA == "send_grid") {
                $predmet = $this->subject;
            }
        }

        //OD MENO
        if ($this->sender_name == false) {
            $od_meno = Settings::get("vendor_company");
        } else {
            if (SEND_EMAIL_VIA == "internal") {
                $od_meno = Dnt::odstran_diakritiku($this->sender_name);
            } elseif (SEND_EMAIL_VIA == "send_grid") {
                $od_meno = $this->sender_name;
            }
        }

        //EMAIL SPRAVA
        if ($this->msg == false) {
            $email_sprava = false;
        } else {
            $email_sprava = $this->msg;
        }


        //SPOJ DOKPOPY
        $subject = iconv('UTF-8', 'windows-1250', $predmet);
        $title = 'Html Email';
        $message = iconv('UTF-8', 'windows-1250', $email_sprava);
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=windows-1250' . "\r\n";
        $headers .= 'To:  <' . $to . '>' . "\r\n"; // dalsi mail sa oddeluje ciarkou
        $headers .= 'From: ' . $od_meno . ' <' . $od_email . '>' . "\r\n";

        if (Settings::show("send_grid_api_key") == true && Settings::show("send_grid_api_template_id") == true) {
            $SEND_GRID_API_KEY = Settings::get("send_grid_api_key");
            $SEND_GRID_API_TEMPLATE_ID = Settings::get("send_grid_api_template_id");
        } else {
            $SEND_GRID_API_KEY = SEND_GRID_API_KEY;
            $SEND_GRID_API_TEMPLATE_ID = SEND_GRID_API_TEMPLATE_ID;
        }

        if (SEND_EMAIL_VIA == "internal") {
            $to = str_replace(" ", "", $to);
            @mail($to, $subject, $message, $headers);
        } elseif (SEND_EMAIL_VIA == "send_grid") {
            $js = array(
                'sub' => array(':name' => array('Elmer')),
                'filters' => array('templates' => array('settings' => array('enable' => 1, 'template_id' => $SEND_GRID_API_TEMPLATE_ID)))
            );
            $to = str_replace(" ", "", $to);
            $od_email = str_replace(" ", "", $od_email);
            $params = array(
                'to' => $to,
                'toname' => $to,
                'from' => $od_email,
                'fromname' => $od_meno,
                'subject' => $predmet,
                'text' => Dnt::not_html($email_sprava),
                'html' => $email_sprava,
                'x-smtpapi' => json_encode($js),
            );

            // Generate curl request
            $session = curl_init(SEND_GRID_API_REQUEST);
            // Tell PHP not to use SSLv3 (instead opting for TLS)
            //curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
            curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $SEND_GRID_API_KEY));
            // Tell curl to use HTTP POST
            curl_setopt($session, CURLOPT_POST, true);
            // Tell curl that this is the body of the POST
            curl_setopt($session, CURLOPT_POSTFIELDS, $params);
            // Tell curl not to return headers, but do return the response
            curl_setopt($session, CURLOPT_HEADER, false);
            curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

            // obtain response
            $response = curl_exec($session);
            $this->response = $response;
            //var_dump($response, curl_error($session));
            curl_close($session);
            //SEND GRID END 
        }
    }

    /**
     * sent_email
     */
    public function sent_email()
    {
        foreach ($this->recipient as $to) {
            $this->prepare_mail($to);
        }
    }

}
