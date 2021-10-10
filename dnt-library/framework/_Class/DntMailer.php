<?php

/**
 *  class       Mailer
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\App\SendGrid;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Settings;
use PHPMailer\PHPMailer\PHPMailer;

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
        $this->dnt = new Dnt();
        $this->settings = new Settings();
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

    public function methodSmtp($config)
    {
        $senderEmail = $config['senderEmail'];
        $senderName = $config['senderName'];
        $recipientEmail = $config['recipientEmail'];
        $recipientName = $config['recipientName'];
        $subject = $config['subject'];
        $message = $config['message'];

        $host = isset($config['host']) ? $config['host'] : $this->settings->get('smtp_host');
        $username = isset($config['username']) ? $config['username'] : $this->settings->get('smtp_username');
        $password = isset($config['password']) ? $config['password'] : $this->settings->get('smtp_password');

        $mail = new PHPMailer(true);
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->Host = $host;
        $mail->SMTPAuth = true;
        $mail->Username = $username;
        $mail->Password = $password;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom($username, $senderName);
        $mail->addAddress($recipientEmail, $recipientName);

        if (isset($config['stringAttachment']) && !empty($config['stringAttachment'])) {
            $stringAttachment = $config['stringAttachment'];
            $mail->addStringAttachment(file_get_contents($stringAttachment), basename($stringAttachment));
        }

        if (isset($config['attachment']) && !empty($config['attachment'])) {
            $attachment = $config['attachment'];
            $mail->addAttachment($attachment);
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
    }

    public function methodSendGridV3($config)
    {

        $senderEmail = $config['senderEmail'];
        $senderName = $config['senderName'];
        $recipientEmail = $config['recipientEmail'];
        $msg = $config['message'];
        $sbj = $config['subject'];
        $SEND_GRID_API_KEY = isset($config['send_grid_api_key']) ? $config['send_grid_api_key'] : $this->settings->get("send_grid_api_key");
        $SEND_GRID_API_TEMPLATE_ID = isset($config['send_grid_api_template_id']) ? $config['send_grid_api_template_id'] : $this->settings->get("send_grid_api_template_id");

        if (is_array($recipientEmail) && is_array($msg)) {
            $emailTo = [];
            $messageTo = [];
            foreach ($recipientEmail as $singl) {
                $emailTo[] = ['email' => $singl];
                $messageTo[] = [
                    'type' => "text/html",
                    'value' => $msg,
                ];
            }
        } else {
            $emailTo = [
                "email" => $recipientEmail,
                "name" => $recipientEmail,
            ];
            $messageTo = [
                'type' => "text/html",
                'value' => $msg,
            ];
        }
        $params = [
            "from" => [
                "email" => $senderEmail,
                "name" => $senderName,
            ],
            "subject" => $sbj,
            "template_id" => $SEND_GRID_API_TEMPLATE_ID,
            "content" => [
                [
                    "type" => "text/html",
                    "value" => $msg,
                ]
            ],
            "personalizations" => [
                [
                    "to" => [
                        [
                            "email" => $recipientEmail,
                            "name" => $recipientEmail,
                        ]
                    ],
                    "send_at" => time()
                ]
            ],
            "tracking_settings" => [
                'click_tracking' => [
                    "enable" => false,
                    "enable_text" => false,
                ],
                'click_tracking' => [
                    "enable" => false,
                    "enable_text" => false,
                ]
            ]
        ];


        $data = json_encode($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sendgrid.com/v3/mail/send');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $headers = array();
        $headers[] = 'Authorization: Bearer ' . $SEND_GRID_API_KEY;
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $this->response = $response;
        //var_dump($this->response);
        curl_close($ch);
    }

    public function methodSendGrid($config)
    {

        $senderEmail = $config['senderEmail'];
        $senderName = $config['senderName'];
        $recipientName = ($config['recipientName']) ? $config['recipientName'] : $config['recipientEmail'];
        $recipientEmail = $config['recipientEmail'];
        $msg = $config['message'];
        $sbj = $config['subject'];
        $SEND_GRID_API_KEY = isset($config['send_grid_api_key']) ? $config['send_grid_api_key'] : $this->settings->get("send_grid_api_key");
        $SEND_GRID_API_TEMPLATE_ID = isset($config['send_grid_api_template_id']) ? $config['send_grid_api_template_id'] : $this->settings->get("send_grid_api_template_id");

        $this->sendGrid = new SendGrid();
        $data = [
            'to' => $recipientEmail,
            'toName' => $recipientName,
            'from' => $senderEmail,
            'fromName' => $senderName,
            'subject' => $sbj,
            'message' => $msg,
            'send_grid_api_key' => $SEND_GRID_API_KEY,
            'send_grid_api_template_id' => $SEND_GRID_API_TEMPLATE_ID,
        ];

        if (isset($config['attachment']) && !empty($config['attachment'])) {
            $attachment = $config['attachment'];
            $data['attachements'] = [
                basename($attachment) => $attachment,
            ];
        }
        if (isset($config['stringAttachment']) && !empty($config['stringAttachment'])) {
            file_put_contents('../dnt-cache/temp/' . basename($config['stringAttachment']), file_get_contents($config['stringAttachment']));
            $data['attachements'] = [
                basename(basename($config['stringAttachment'])) => '../dnt-cache/temp/' . basename($config['stringAttachment']),
            ];
        }

        $this->sendGrid->setup($data);
        $this->sendGrid->sent();
        if (isset($config['stringAttachment']) && !empty($config['stringAttachment'])) {
            unlink('../dnt-cache/temp/' . basename($config['stringAttachment']));
        }
        return 1;
        /*
          $senderEmail = $config['senderEmail'];
          $senderName = $config['senderName'];
          $recipientEmail = $config['recipientEmail'];
          $msg = $config['message'];
          $sbj = $config['subject'];
          $SEND_GRID_API_KEY = isset($config['send_grid_api_key']) ? $config['send_grid_api_key'] : $this->settings->get("send_grid_api_key");
          $SEND_GRID_API_TEMPLATE_ID = isset($config['send_grid_api_template_id']) ? $config['send_grid_api_template_id'] : $this->settings->get("send_grid_api_template_id");

          $js = array(
          'sub' => array(':name' => array('Elmer')),
          'filters' => array('templates' => array('settings' => array('enable' => 1, 'template_id' => $SEND_GRID_API_TEMPLATE_ID)))
          );

          $params = array(
          'to' => str_replace(' ', '', $recipientEmail),
          'toname' => $recipientEmail,
          'from' => str_replace(' ', '', $senderEmail),
          'fromname' => $senderName,
          'subject' => $sbj,
          'text' => $this->dnt->not_html($msg),
          'html' => $msg,
          'x-smtpapi' => json_encode($js),
          );

          // Generate curl request
          $session = curl_init(SEND_GRID_API_REQUEST);
          curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $SEND_GRID_API_KEY));
          curl_setopt($session, CURLOPT_POST, true);
          curl_setopt($session, CURLOPT_POSTFIELDS, $params);
          curl_setopt($session, CURLOPT_HEADER, false);
          curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

          // obtain response
          $response = curl_exec($session);
          $this->response = $response;
          curl_close($session);
         * */
    }

    public function methodNativePHPMailer($config)
    {
        $senderEmail = $config['senderEmail'];
        $senderName = iconv('UTF-8', 'windows-1250', ($config['senderName']) ? $config['senderName'] : $config['senderEmail']);
        $recipientName = iconv('UTF-8', 'windows-1250', ($config['recipientName']) ? $config['recipientName'] : $config['recipientEmail']);
        $recipientEmail = $config['recipientEmail'];
        $subject = iconv('UTF-8', 'windows-1250', $config['subject']);
        $message = $config['message'];

        $mail = new PHPMailer(true);
        $mail->isSendmail();
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->setFrom($senderEmail, $senderName);
        $mail->addAddress($recipientEmail, $recipientName);
        $mail->Subject = $subject;
        $mail->msgHTML($message);

        if (isset($config['stringAttachment']) && !empty($config['stringAttachment'])) {
            $stringAttachment = $config['stringAttachment'];
            $mail->addStringAttachment(file_get_contents($stringAttachment), basename($stringAttachment));
        }

        if (isset($config['attachment']) && !empty($config['attachment'])) {
            $attachment = $config['attachment'];
            $mail->addAttachment($attachment);
        }
        $mail->send();
    }

    public function methodNative($config)
    {
        $senderEmail = $config['senderEmail'];
        $senderName = iconv('UTF-8', 'windows-1250', ($config['senderName']) ? $config['senderName'] : $config['senderEmail']);
        $recipientEmail = $config['recipientEmail'];
        $subject = iconv('UTF-8', 'windows-1250', $config['subject']);

        if (strtoupper(substr(PHP_OS, 0, 3) == 'WIN')) {
            $eol = "\r\n";
        } elseif (strtoupper(substr(PHP_OS, 0, 3) == 'MAC')) {
            $eol = "\r";
        } else {
            $eol = "\n";
        }

        # Common Headers
        $headers = '';
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: ' . $senderName . ' <' . $senderEmail . '>' . $eol;
        $headers .= 'To: <' . $recipientEmail . '>' . $eol;
        $headers .= 'Return-Path: ' . $senderName . ' <' . $senderEmail . '>' . $eol;
        $headers .= "Message-ID:<TheSystem@" . $_SERVER['SERVER_NAME'] . ">" . $eol;
        $headers .= "X-Mailer: PHP v" . phpversion() . $eol;
        $headers .= 'MIME-Version: 1.0' . $eol;
        $headers .= 'X-MS-Exchange-Organization-AuthSource: VE1PR05MB7229.eurprd05.prod.outlook.com' . $eol;
        $headers .= 'Content-type: text/html; charset=windows-1250' . "\r\n";

        $message = '';
        $message .= iconv('UTF-8', 'windows-1250', $config['message']) . $eol . $eol;
        @mail($recipientEmail, $subject, $message, $headers);
    }

    public function sent($config)
    {
        if (is_array($config) && isset($config['method'])) {
            switch ($config['method']) {
                case 'SendGridV2':
                    $this->methodSendGrid($config);
                    break;
                case 'SendGridV3':
                    $this->methodSendGridV3($config);
                    break;
                case 'Smtp':
                    $this->methodSmtp($config);
                    break;
                case 'NativePHPMailer':
                    $this->methodNativePHPMailer($config);
                    break;
                case 'NativeMail':
                    $this->methodNative($config);
                    break;
            }
        } else {
            die('co config file');
        }
    }

    /**
     * 
     * @param type $to
     */
    public function prepare_mail($to)
    {

        //SENDER
        if ($this->sender_email == false) {
            $od_email = $this->settings->get("vendor_email");
        } else {
            $od_email = $this->sender_email;
        }

        //PREDMET
        if ($this->subject == false) {
            $predmet = "(no subject)";
        } else {
            if (SEND_EMAIL_VIA == "internal") {
                $predmet = $this->dnt->odstran_diakritiku($this->subject);
            } elseif (SEND_EMAIL_VIA == "send_grid") {
                $predmet = $this->subject;
            }
        }

        //OD MENO
        if ($this->sender_name == false) {
            $od_meno = $this->settings->get("vendor_company");
        } else {
            if (SEND_EMAIL_VIA == "internal") {
                $od_meno = $this->dnt->odstran_diakritiku($this->sender_name);
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

        if ($this->settings->show("send_grid_api_key") == true && $this->settings->show("send_grid_api_template_id") == true) {
            $SEND_GRID_API_KEY = $this->settings->get("send_grid_api_key");
            $SEND_GRID_API_TEMPLATE_ID = $this->settings->get("send_grid_api_template_id");
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
                'text' => $this->dnt->not_html($email_sprava),
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
        } elseif (SEND_EMAIL_VIA == "smtp") {
            
        }
    }

    public function prepare_mail_v3($to, $messages = false)
    {

        //SENDER
        if ($this->sender_email == false) {
            $od_email = $this->settings->get("vendor_email");
        } else {
            $od_email = $this->sender_email;
        }

        //PREDMET
        if ($this->subject == false) {
            $predmet = "(no subject)";
        } else {
            if (SEND_EMAIL_VIA == "internal") {
                $predmet = $this->dnt->odstran_diakritiku($this->subject);
            } elseif (SEND_EMAIL_VIA == "send_grid") {
                $predmet = $this->subject;
            }
        }

        //OD MENO
        if ($this->sender_name == false) {
            $od_meno = $this->settings->get("vendor_company");
        } else {
            if (SEND_EMAIL_VIA == "internal") {
                $od_meno = $this->dnt->odstran_diakritiku($this->sender_name);
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

        if ($this->settings->show("send_grid_api_key") == true && $this->settings->show("send_grid_api_template_id") == true) {
            $SEND_GRID_API_KEY = $this->settings->get("send_grid_api_key");
            $SEND_GRID_API_TEMPLATE_ID = $this->settings->get("send_grid_api_template_id");
        } else {
            $SEND_GRID_API_KEY = SEND_GRID_API_KEY;
            $SEND_GRID_API_TEMPLATE_ID = SEND_GRID_API_TEMPLATE_ID;
        }

        if (is_array($to) && is_array($messages)) {
            $emailTo = [];
            $messageTo = [];
            foreach ($to as $singl) {
                $emailTo[] = ['email' => $singl];
                $messageTo[] = [
                    'type' => "text/html",
                    'value' => $email_sprava,
                ];
            }
        } else {
            $emailTo = [
                "email" => $to,
                "name" => $to,
            ];
            $messageTo = [
                'type' => "text/html",
                'value' => $email_sprava,
            ];
        }
        $params = [
            "from" => [
                "email" => $od_email,
                "name" => $od_meno,
            ],
            "subject" => $predmet,
            "template_id" => $SEND_GRID_API_TEMPLATE_ID,
            "content" => [
                [
                    "type" => "text/html",
                    "value" => $email_sprava,
                ]
            ],
            "personalizations" => [
                [
                    "to" => [
                        [
                            "email" => $to,
                            "name" => $to,
                        ]
                    ],
                    "send_at" => time()
                ]
            ],
            "tracking_settings" => [
                'click_tracking' => [
                    "enable" => false,
                    "enable_text" => false,
                ],
                'click_tracking' => [
                    "enable" => false,
                    "enable_text" => false,
                ]
            ]
        ];


        $data = json_encode($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sendgrid.com/v3/mail/send');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $headers = array();
        $headers[] = 'Authorization: Bearer ' . $SEND_GRID_API_KEY;
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $this->response = $response;
        var_dump($this->response);
        curl_close($ch);
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
