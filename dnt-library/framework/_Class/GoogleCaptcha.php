<?php

/**
 *  class       Google Captcha
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use Exception;

class GoogleCaptcha
{

    const SERVICE_URL = 'https://www.google.com/recaptcha/api/siteverify?secret=%s&response=%s';

    public $privateToken;

    public $publicToken;

    public $postName;

    public $checkedOptions = null;

    protected $config = array(
        'google-recaptcha' => array(
            'postName' => 'g-recaptcha-response',
        ),
    );

    /**
     *
     * @param type $config
     * @return \Application\Service\GoogleCaptcha
     * @throws Exception
     */
    public function __construct($siteKey, $secretKey)
    {
        if (!isset($this->config['google-recaptcha'])) {
            throw new Exception('No google captcha set-up');
        }

        $this->publicToken = $siteKey;
        $this->privateToken = $secretKey;
        $this->postName = $this->config['google-recaptcha']['postName'];
        return $this;
    }

    /**
     *
     * @param type $checkedOptions
     * @return \Application\Service\GoogleCaptcha
     */
    public function setCheckedOptions($checkedOptions)
    {
        $this->checkedOptions = $checkedOptions;
        return $this;
    }

    /**
     *
     * @return boolean
     */
    public function getResponse()
    {
        $verifyResponse = file_get_contents(sprintf(self::SERVICE_URL, $this->privateToken, $this->checkedOptions));
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {
            return true;
        }
        return false;
    }

    /**
     * V pripade chybnej odpovede FALSE
     * @return boolean
     */
    public function getResult()
    {
        if (is_null($this->checkedOptions)) {
            return false;
        }

        return $this->getResponse();
    }

    /**
     * Nazov _POST parametra google re-captcha inputu
     * @return string
     */
    public function getPostName()
    {
        return $this->postName;
    }
}
