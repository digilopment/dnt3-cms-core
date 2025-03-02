<?php

namespace DntApi;

use DntLibrary\Base\Rest;

class SendMailApi
{
    protected $dnt;

    public function __construct()
    {
        $this->rest = new Rest();
    }

    public function pripare()
    {
        if ($this->rest->get('fromEmail')) {
            $this->fromEmail = urldecode($this->rest->get('fromEmail'));
        }
        if ($this->rest->get('fromName')) {
            $this->fromName = urldecode($this->rest->get('fromName'));
        }
        if ($this->rest->get('toEmail')) {
            $this->toEmail = urldecode($this->rest->get('toEmail'));
        }
        if ($this->rest->get('subject')) {
            $this->subject = urldecode($this->rest->get('subject'));
        }
    }

    public function content($confirmUrl)
    {
        $this->content = '<html><body><h2>Confirm data</h2></body></html>';
    }

    public function run()
    {
        $domain = $this->rest->get('confirmUrl');
        $confirmUrl = $domain . '?signature=' . $this->rest->get('signature') . '&time_signature=' . $this->rest->get('time_signature') . '&round_id=' . $this->rest->get('round_id');
       
        $this->pripare();
        $this->content($confirmUrl);

        $SEND_GRID_API_TEMPLATE_ID = SEND_GRID_API_TEMPLATE_ID;
        $YOUR_API_KEY = SEND_GRID_API_KEY;
        $params = [
            'from' => [
                'email' => $this->fromEmail,
                'name' => $this->fromName,
            ],
            'subject' => $this->subject,
            'template_id' => $SEND_GRID_API_TEMPLATE_ID,
            'content' => [
                [
                    'type' => 'text/html',
                    'value' => $this->content,
                ],
            ],
            'personalizations' => [
                [
                    'to' => [
                        [
                            'email' => $this->toEmail,
                        ],
                    ],
                    'send_at' => time(),
                ],
            ],
            'tracking_settings' => [
                'click_tracking' => [
                    'enable' => false,
                    'enable_text' => false,
                ],
                'click_tracking' => [
                    'enable' => false,
                    'enable_text' => false,
                ],
            ],
        ];

        $data = json_encode($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sendgrid.com/v3/mail/send');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $headers = array();
        $headers[] = 'Authorization: Bearer ' . $YOUR_API_KEY;
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        var_dump($result);
        curl_close($ch);
    }
}
