<?php

namespace DntTest;

use DntLibrary\App\SendGrid;

class SendGridTest
{
    protected $dnt;

    public function __construct()
    {
        $this->sendGrid = new SendGrid();
    }

    public function run()
    {

        $data = [
            'to' => 'thomas.doubek@gmail.com',
            'toName' => 'Tomáš Doubek',
            'from' => 'newsletter@mailer.service.com',
            'fromName' => 'Markiza Mail',
            'subject' => 'Voyo TEST',
            'message' => file_get_contents('https://www.newsletter.coloria.sk/voyo/'),
            'attachements' => [
                '710944582_result.pdf' => 'data/710944582_result.pdf',
            ],
        ];

        $this->sendGrid->setup($data);
        $this->sendGrid->sent();

        var_dump($this->sendGrid->response);
    }
}
