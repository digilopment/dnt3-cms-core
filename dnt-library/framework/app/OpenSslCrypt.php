<?php

namespace DntLibrary\App;

use DntLibrary\Base\Dnt;

class OpenSslCrypt
{

    private $privateKey = 'Dnt3Platform'; //Hex is forced. You can use string key and key is converts to hex
    private $encryptionIv = '1234567891011121';  //Non-NULL Initialization Vector for encryption 
    private $options = 0; //custom options, default = 0
    private $cipheringAlg = 'AES-128-CTR'; //ciphering Algorithmus

    public function __construct($customPrivateKey = false)
    {
        $this->dnt = new Dnt();
        if ($customPrivateKey) {
            $this->privateKey = $customPrivateKey;
        }
        $this->privateKey = $this->dnt->strToHex($this->privateKey);
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
