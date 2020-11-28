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
            'to' => 'formalny.odosielatel@gmail.com',
            'toName' => 'Formálny Odosielateľ',
            'from' => 'voyo@markizasss.sk',
            'fromName' => 'Voyo 2010sss',
            'subject' => 'Covid19-test resulssst',
            'message' => file_get_contents('https://www.newsletter.coloria.sk/voyo'),
            'attachements' => [
            //'TheWebsite1579787040.pdf' => 'data/TheWebsite1579787040.pdf',
            ],
        ];

        $this->sendGrid->setup($data);
        $this->sendGrid->sent();

        var_dump($this->sendGrid->response);
    }

}
