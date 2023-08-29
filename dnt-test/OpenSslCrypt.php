<?php

namespace DntTest;

use DntLibrary\App\OpenSslCrypt;

class OpenSslCryptTest
{

    private $privateKey = 'customKeySetHere';

    public function __construct()
    {
        $this->sslCrypt = new OpenSslCrypt($this->privateKey);
    }

    public function run()
    {
        $content = 'Hello World';
        $encrypt = $this->sslCrypt->encrypt($content);
        $decrypt = $this->sslCrypt->decrypt($encrypt);

        echo $encrypt;
        echo '<br/>';
        echo $decrypt;
    }

}
