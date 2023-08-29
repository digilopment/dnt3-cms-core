<?php

namespace DntTest;

use DntLibrary\App\Dnt3Oauth;

class OauthTest
{
    public $setHeader = false;

    public function __construct()
    {
        $this->dnt3Oauth = new Dnt3Oauth();
    }

    public function run()
    {

        $config = [
            'login' => 'tomas',
            'passwor' => 'admin',
            'privateKey' => 'roots',
        ];
        $this->setHeader = true;
        $this->dnt3Oauth->customDenied = true;
        $this->dnt3Oauth->setCredencials($config);
        print('logged');
    }
}
