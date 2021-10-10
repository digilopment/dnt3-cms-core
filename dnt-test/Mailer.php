<?php

namespace DntTest;

use DntLibrary\Base\Mailer;

class MailerTest
{

    public function __construct()
    {
        $this->mailer = new Mailer();
    }

    public function run()
    {
        $config = [
            #DEFAULT
            'senderEmail' => 'info@query.sk',
            'senderName' => 'Dnt3 Platforma',
            'recipientEmail' => '',
            'recipientName' => '',
            'message' => '<body><h2>Test email</h2> Ahoj, toto je testovací email odoslaný nativnou metodou.</body>',
            'subject' => 'Test Mail',
            
            #ATTACHAMENT use stringAttachment or attachment
            'stringAttachment' => 'http://www.africau.edu/images/default/sample.pdf',
            //'attachment' => 'data/test.pdf',
            //
            #SENGRID
            'send_grid_api_key' => '',
            'send_grid_api_template_id' => '',
            
            #SMTP
            'host' => 'smtp.gmail.com',
            'username' => '',
            'password' => '',
            
            #METHOD
            'method' => 'Smtp',
        ];

        $this->mailer->sent($config);
    }

}
