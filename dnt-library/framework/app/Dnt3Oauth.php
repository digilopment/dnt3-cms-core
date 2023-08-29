<?php

namespace DntLibrary\App;

use DntLibrary\App\OpenSslCrypt;
use DntLibrary\Base\Dnt;

class Dnt3Oauth
{

    public $setHeader = false;
    public $isLogged = false;
    public $customDenied = false;

    public function __construct()
    {
        $this->dnt = new Dnt();
    }

    public function setCredencials($config)
    {
        $this->config = $config;
        $login = isset($config['login']) ? $config['login'] : '';
        $password = isset($config['passwor']) ? $config['passwor'] : '';
        $privateKey = isset($config['privateKey']) ? $config['privateKey'] : '';
        $this->credencials = [
            'login' => $login,
            'passwor' => $password,
            'privateKey' => $privateKey
        ];
        $this->createToken();
        $this->setAuth();
        $this->setHeader();
        $this->useAuth();
    }

    protected function getHeaderToken()
    {

        $headers = headers_list();
        $xAuthHeader = false;
        foreach ($headers as $header) {
            if ($this->dnt->in_string('', $header)) {
                $xAuthHeader = explode(':', $header)[1];
            }
        }
        return $xAuthHeader;
    }

    protected function setHeader()
    {
        if ($this->setHeader) {
            header('X-Dnt3-Auth:' . $this->token);
        }
    }

    protected function setAuth()
    {
        $_SERVER['HTTP_DNT3_AUTHORIZATION'] = $this->token;
    }

    protected function useAuth()
    {
        $has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
        $is_not_authenticated = (
                !$has_supplied_credentials ||
                $_SERVER['PHP_AUTH_USER'] != $this->credencials['login'] ||
                $_SERVER['PHP_AUTH_PW'] != $this->credencials['passwor']
                );
        if (!$is_not_authenticated || $_SERVER['HTTP_DNT3_AUTHORIZATION'] == $this->getHeaderToken()) {
            $this->isLogged = true;
        } else {
            if ($this->customDenied == false) {
                header('HTTP/1.1 401 Authorization Required');
                header('WWW-Authenticate: Basic realm="Access denied"');
                die('<h1>403 Forbidden</h1>');
            }
        }
    }

    protected function createToken()
    {
        $tokenator = $this->config['login'] . ':' . $this->config['passwor'];
        $this->sslCrypt = new OpenSslCrypt($this->config['privateKey']);
        $this->token = $this->sslCrypt->encrypt($tokenator);
    }

}
