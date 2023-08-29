<?php

namespace DntTest;

class SendGridV3Test
{
    protected $dnt;

    public function run()
    {
        $SEND_GRID_API_TEMPLATE_ID = SEND_GRID_API_TEMPLATE_ID;
        $YOUR_API_KEY = SEND_GRID_API_KEY;
        $params = [
            'from' => [
                'email' => 'newsletter@markiza' . time() . '.sk',
                'name' => 'TV Markíza',
            ],
            'subject' => 'Voyo Novinky ' . time(),
            'template_id' => $SEND_GRID_API_TEMPLATE_ID,
            'content' => [
                [
                    'type' => 'text/html',
                    'value' => file_get_contents('https://www.newsletter.coloria.sk/voyo/'),
                ],
            ],
            'personalizations' => [
                [
                    'to' => [
                        [
                            'email' => 'thomas.doubek@gmail.com',
                            'name' => 'Tomáš Doubek',
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
