<?php

namespace DntTest;

use DntLibrary\App\Curl;
use DntLibrary\App\Dnt3Oauth;

class OauthCurlTest
{
    public $setHeader = false;

    public function __construct()
    {
        $this->dnt3Oauth = new Dnt3Oauth();
        $this->curl = new Curl();
    }

    public function run()
    {
        $config = [
            'login' => 'tomas',
            'passwor' => 'admin',
            'privateKey' => 'roots',
        ];
        $this->dnt3Oauth->setCredencials($config);
        $options = [CURLOPT_HTTPHEADER => ['X-Dnt3-Auth:' . $this->dnt3Oauth->token]];
        $response = $this->curl->post([], 'https://markiza.digilopment.com/dnt-test/oauth', $options);
        var_dump($response);
        var_dump($this->dnt3Oauth->token);

        print('logged');
    }
}
