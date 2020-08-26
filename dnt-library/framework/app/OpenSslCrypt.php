<?php

namespace App;

class OpenSslCrypt
{

    private $privateKey = 'Dnt3Platform'; //default key
    private $encryptionIv = '1234567891011121';  //Non-NULL Initialization Vector for encryption 
    private $options = 0; //custom options, default = 0
    private $cipheringAlg = 'AES-128-CTR'; //ciphering Algorithmus

    public function __construct($customPrivateKey = false)
    {
        if ($customPrivateKey) {
            $this->privateKey = $customPrivateKey;
        }
    }

    public function encrypt($string)
    {
        $encryption = openssl_encrypt($string, $this->cipheringAlg, $this->privateKey, $this->options, $this->encryptionIv);
        return $encryption;
    }

    public function decrypt($encrypted)
    {
        $decryption = openssl_decrypt($encrypted, $this->cipheringAlg, $this->privateKey, $this->options, $this->encryptionIv);
        return $decryption;
    }

}
