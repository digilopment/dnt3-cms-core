<?php

namespace DntTest;

use SendGrid\Mail\Mail;

class SendGridV3Test
{

    protected $dnt;

    public function __construct()
    {
        $this->sendgrid = $email = new Mail();
    }

    public function run()
    {
        $SEND_GRID_API_TEMPLATE_ID = '21118ecf-c7b2-48fc-bc5d-2751472db4a3';
        $YOUR_API_KEY = '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';
        $params = [
            "from" => [
                "email" => "newsletter@markiza" . time() . ".sk",
                "name" => "TV Markíza",
            ],
            "subject" => 'Voyo Novinky ' . time(),
            "template_id" => $SEND_GRID_API_TEMPLATE_ID,
            "content" => [
                [
                    "type" => "text/html",
                    "value" => file_get_contents('https://www.newsletter.coloria.sk/voyo/')
                ]
            ],
            "personalizations" => [
                [
                    "to" => [
                        [
                            "email" => "thomas.doubek@gmail.com",
                            "name" => "Tomáš Doubek",
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
