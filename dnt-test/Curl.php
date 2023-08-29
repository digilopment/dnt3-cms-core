<?php

namespace DntTest;

use DntLibrary\App\Curl;

class CurlTest
{
    public function __construct()
    {
        $this->curl = new Curl();
    }

    public function run()
    {
        $config = [
            'method' => 'SendGridV2',

            #DEFAULT
            'senderEmail' => '',
            'senderName' => 'Dnt3 Platforma',
            'recipientEmail' => '',
            'recipientName' => '',
            'message' => '<body><h2>Test email</h2> Ahoj, toto je testovací email odoslaný cez Dnt3 Mailer service metodou SendGridV2.</body>',
            'subject' => 'Test Mail',

            #ATTACHAMENT use stringAttachment or attachment
            'stringAttachment' => 'http://www.africau.edu/images/default/sample.pdf',
            //'attachment' => 'data/test.pdf',

            #SENGRID
            'send_grid_api_key' => '',
            'send_grid_api_template_id' => '',

            #SMTP
            'host' => 'smtp.gmail.com',
            'username' => '',
            'password' => '',
        ];
        $this->curl->post($config, 'http://markiza.digilopment.com/dnt-api/mailer-service');
    }
}
