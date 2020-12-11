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
            'from' => 'corona@amplexa.com',
            'fromName' => 'corona@amplexa.com',
            'subject' => 'Covid19-test result',
            'message' => file_get_contents('http://digilopment.com/dnt-test/data/covidEmail.html'),
            'attachements' => [
				'710944582_result.pdf' => 'data/710944582_result.pdf',
            ],
        ];

        $this->sendGrid->setup($data);
        $this->sendGrid->sent();

        var_dump($this->sendGrid->response);
    }

}
