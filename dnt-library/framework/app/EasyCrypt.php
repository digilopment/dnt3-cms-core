<?php

namespace App;

class EasyCrypt
{
    private $privateKey = 'Dnt3Platform';

    public function __construct($customPrivateKey = false)
    {
        if ($customPrivateKey) {
            $this->privateKey = $customPrivateKey;
        }
    }

    public function encrypt($string)
    {
        $key = $this->privateKey;
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
        return $encrypted;
    }

    public function decrypt($encrypted)
    {
        $key = $this->privateKey;
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), '');
        return $decrypted;
    }
}
