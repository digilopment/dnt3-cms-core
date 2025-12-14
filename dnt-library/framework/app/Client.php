<?php

/**
 *  class       Client
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2019
 */

namespace DntLibrary\App;

use DntLibrary\App\Database;

class Client extends Database
{
    public $id;

    public $wwwPath = WWW_PATH;

    public $url;

    public $lang;

    public $layout = 'default';

    public $primaryRootUrl;

    public $realUrl;

    public $showRealUrl;

    public $domain;

    public $domainNP;

    public $request;

    public $requestNoParam;

    public $requestNoLang;

    public $domainWww;

    public $originProtocol;

    public $clients;

    public $init;

    public $settings;

    public $routes;

    public $rpc;

    protected function url(): void
    {
        $hosts = explode('.', $_SERVER['HTTP_HOST'] ?? '');
        $host = $hosts[0] ?? '';

        if ($host === 'www' && isset($hosts[1])) {
            $this->url = $hosts[1];
        } elseif ($host === ($_SERVER['HTTP_HOST'] ?? '')) { //ak nie je subdomena, tak vrati false
            $this->url = false;
        } else {
            $this->url = $host ?: false;
        }
    }

    protected function isIncluded(string $pharse, string $str): bool
    {
        return (bool)preg_match('/' . preg_quote($pharse, '/') . '/', $str);
    }

    protected function clients()
    {
        $query = 'SELECT * FROM `dnt_vendors`';
        if ($this->num_rows($query) > 0) {
            $this->clients = $this->get_results($query, true);
        }
        foreach ($this->clients as $client) {
            if ($client->real_url) {
                $client->real_url = rtrim($client->real_url, '/');
            }
        }
    }

    protected function loadSettings()
    {
        $query = "SELECT * FROM dnt_settings WHERE `vendor_id` = '" . $this->id . "'";
        if ($this->num_rows($query) > 0) {
            $this->settings = $this->get_results($query, true);
        }
    }

    public function getSetting($key)
    {
        foreach ($this->settings as $setting) {
            if ($setting->key == $key) {
                return $setting->value;
            }
        }
        return false;
    }

    protected function id(): void
    {
        $hasMatch = 0;
        foreach ($this->clients as $client) {
            if ($client->real_url) {
                $realUrlNp = explode('://', $client->real_url);
                if (!isset($realUrlNp[1])) {
                    continue;
                }
                $realUrlNp = $realUrlNp[1];
                if ((str_replace('/', '', $this->domainNP . $this->urlHooks(0)) == str_replace('/', '', $realUrlNp) ||
                        str_replace('/', '', 'www.' . $this->domainNP . $this->urlHooks(0)) == str_replace('/', '', $realUrlNp)) &&
                        $client->show_real_url == 1 && $hasMatch == 0 && $client->real_url
                ) {
                    $hasMatch = 1;
                    $this->id = $client->id_entity;
                    $this->realUrl = $client->real_url;
                    $this->showRealUrl = $client->show_real_url;
                    $this->layout = $client->layout;
                }
            }
        }

        foreach ($this->clients as $client) {
            if ($client->real_url) {
                $realUrlNp = explode('://', $client->real_url);
                if (!isset($realUrlNp[1])) {
                    continue;
                }
                $realUrlNp = $realUrlNp[1];

                if ((str_replace('/', '', $this->domainNP) == str_replace('/', '', $realUrlNp) ||
                        str_replace('/', '', 'www.' . $this->domainNP) == str_replace('/', '', $realUrlNp)
                        ) && $hasMatch == 0) {
                    $hasMatch = 1;
                    $this->id = $client->id_entity;
                    $this->realUrl = $client->real_url;
                    $this->showRealUrl = $client->show_real_url;
                    $this->layout = $client->layout;
                }
            }
        }

        foreach ($this->clients as $client) {
            if ($this->url == $client->name_url && $hasMatch == 0) {
                $hasMatch = 1;
                $this->id = $client->id_entity;
                $this->realUrl = $client->real_url;
                $this->showRealUrl = $client->show_real_url;
                $this->layout = $client->layout;
            }
        }
    }

    protected function rootDomainParser(): void
    {
        if ($this->isIncluded('www.', WWW_PATH)) {
            $this->domainWww = 'www';
        }

        $data = WWW_PATH;
        $data = explode('://', $data);
        $ORIGIN_PROTOCOL = (isset($data[0]) ? $data[0] : 'http') . '://';
        
        if (!isset($data[1])) {
            $this->domainNP = '';
            $this->originProtocol = $ORIGIN_PROTOCOL;
            $this->request = '';
            $this->requestNoParam = '';
            $this->requestNoLang = '';
            return;
        }
        
        $data = explode('/', $data[1]);
        $ORIGIN_DOMAIN = HTTP_PROTOCOL . ($data[0] ?? '') . '' . WWW_FOLDERS . '';
        $ORIGIN_DOMAIN_NP = ($data[0] ?? '') . '' . WWW_FOLDERS . '';

        $this->domainNP = $ORIGIN_DOMAIN_NP;
        $this->originProtocol = $ORIGIN_PROTOCOL;
        
        $requestParts = explode($this->domainNP, WWW_FULL_PATH);
        $this->request = $requestParts[1] ?? '';
        
        $requestNoParamParts = explode('?', $this->request);
        $this->requestNoParam = $requestNoParamParts[0] ?? '';

        if ($this->urlLang()) {
            $requestNoLangParts = explode('/' . $this->urlLang(), $this->requestNoParam);
            $this->requestNoLang = $requestNoLangParts[1] ?? $this->requestNoParam;
        } else {
            $this->requestNoLang = $this->requestNoParam;
        }
    }


public function route($index)
    {
        $data = ltrim($this->requestNoParam, '/');
        $data = explode('/', $data);
        if ($index === false) {
            if ($this->urlLang()) {
                $this->routes = $data;
                $this->lang = $this->urlLang();
            } else {
                $this->lang = (MULTY_LANGUAGE === false) ? DEAFULT_LANG : $this->getSetting('language');
                $this->routes = array_merge(array(
                    $this->lang,
                        ), $data);
            }
        } else {
            if (isset($this->routes[$index]) && $this->routes[$index] != '') {
                return $this->routes[$index];
            }
        }
    }

    protected function domainParser(string $dbDomain): array
    {
        $www = false;
        $protocol = false;
        $domain = false;
        $www_folders = false;
        $lang = false;

        $data = explode('://', $dbDomain);
        if (isset($data[0])) {
            $protocol = $data[0] . '://';
        }

        if (isset($data[1])) {
            $dataLng = explode('/', $data[1]);
            if (!empty($dataLng)) {
                $lng = $dataLng[count($dataLng) - 1];
                if (strlen($lng) == 2) {
                    $lang = $lng;
                }
            }
        }

        if ($this->isIncluded(str_replace('/', '~', WWW_FOLDERS), str_replace('/', '~', $dbDomain))) {
            $www_folders = WWW_FOLDERS;
        }

        if (isset($data[1])) {
            $domain = $data[1];
            $domain = str_replace('www.', '', $domain);
            $domainParts = explode('/', $domain);
            $domain = $domainParts[0] ?? '';

            if ($www_folders && $domain) {
                $domain = $domain . '' . $www_folders;
            }
        }

        if ($this->isIncluded('www', $dbDomain)) {
            $www = 'www';
        }

        return [
            'www' => $www,
            'protocol' => $protocol,
            'domain' => $domain,
            'www_folders' => $www_folders,
            'lang' => $lang,
        ];
    }

    protected function redirect(string $domain): void
    {
        if (!headers_sent()) {
            header("Location: $domain");
            exit;
        }
    }

    public function urlLang(): string|false
    {
        $parts = explode('/', ltrim($this->request ?? '', '/'));
        $urlLang = $parts[0] ?? '';
        if (strlen($urlLang) == 2) {
            return $urlLang;
        }
        return false;
    }

    protected function rpc()
    {
        $data = explode('/', ltrim($this->request, '/'));
        if (in_array('rpc', $data)) {
            $this->rpc = true;
        }
    }

    public function urlHooks($index)
    {
        $hooks = explode('/', ltrim($this->request, '/'));
        if (isset($hooks[$index])) {
            return $hooks[$index];
        } else {
            return false;
        }
    }
    
    /**
     * Spracuje logiku presmerovania na externú/cieľovú doménu a jazykovú verziu.
     *
     * @param string $dbDomain Doména z databázy (cieľová doména).
     * @param string $wwwPath Základná (lokálna) doména webu.
     * @param bool $toDbDomain Určuje, či sa má presmerovať na $dbDomain (predvolené true).
     * @param string|false $language Aktuálna/cieľová jazyková skratka.
     * @return void
     */
    public function setDomain(string $dbDomain = '', string $wwwPath, bool $toDbDomain = true, $language = false): void
    {
        // 1. Ošetrenie NULL (Fatal Error) a prázdneho reťazca
        // Nastavíme defaultnú hodnotu v hlavičke na '', aby sme sa vyhli TypeError, ak voláme s NULL.
        // Ak je $dbDomain prázdna (null alebo '' z calleru) a má sa presmerovať na DB doménu,
        // vykonáme presmerovanie na aktuálnu doménu bez subdomény a bez jazyka.
        
        if (empty($dbDomain)) {
            // Použijeme WWW_PATH (alebo $wwwPath, ak nie je definovaná konštanta) ako základnú doménu pre parsovanie
            $baseDomain = defined('WWW_PATH') ? WWW_PATH : $wwwPath;
            $data = $this->domainParser($baseDomain);
            
            // Konštrukcia cieľovej domény (len protocol a domain, bez www a bez subdomény)
            // Predpokladáme, že $this->domainParser() vráti doménu bez www v $data['domain'].
            $newDomain = $data['protocol'] . $data['domain'] . $this->requestNoLang;
            
            // Získanie aktuálnej URL
            $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
            $currentUrl = $scheme . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            
            // Presmerovanie len vtedy, ak aktuálna URL nie je už cieľová
            if (rtrim($currentUrl, '/') != rtrim($newDomain, '/')) {
                $this->redirect($newDomain);
                exit;
            }
            return; // Ak sa doména zhoduje a $dbDomain je null, ukončíme funkciu bez ďalšej logiky.
        }
        
        // 2. Ostatná logika (pokračuje pôvodný optimalizovaný kód, ktorý bol pod čiarou)
        
        // Zvyšok kódu z predošlej optimalizovanej verzie začína TU:
        
        // Získanie aktuálnej URL (musí byť opäť, ak sme nevyšli v prvom IF bloku)
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $currentUrl = $scheme . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        
        // Pomocné premenné
        $currentLang = $this->urlLang($this->request ?? '');
        $dbDomainNormalized = rtrim($dbDomain, '/');
        $wwwPathNormalized = rtrim($wwwPath, '/');
        
        // ... (Zvyšok optimalizovaného kódu od bodu 2. až do konca) ...
        
        $isDbDomainMatch = ($dbDomainNormalized == $wwwPathNormalized) || 
                           ($dbDomainNormalized == rtrim($wwwPathNormalized . $this->urlLang(), '/'));
                           
        if ($toDbDomain || $isDbDomainMatch) {
            
            // Pôvodný blok s die() pre prázdnu DB doménu už nie je potrebný, lebo ho ošetrí úvodný IF (empty($dbDomain)).
            // Ak by ste ho chceli zachovať pre prípad, že caller pošle '' namiesto null, zmeníte ho takto:
            
            /*
            if ($toDbDomain && empty($dbDomain)) {
                 die('<h2>Externá doména neexistuje, alebo nie je priradená k webu.</h2>Prosím vypnite v nastaveniach permanentné presmerovanie na externú doménu, alebo pridajte externú doménu.');
            }
            */

            $data = $this->domainParser($dbDomain);
            $wwwPrefix = $data['www'] ? 'www.' : '';
            $targetDomain = $data['protocol'] . $wwwPrefix . $data['domain'];
            
            // Presmerovanie z default lang na no-lang (ak nie je RPC volanie a je multi-language)
            if ($currentLang == $language && $data['lang'] === false && $this->rpc === null && defined('MULTY_LANGUAGE') && MULTY_LANGUAGE === true) {
                $newDomain = $targetDomain . $this->requestNoLang;
                $this->redirect($newDomain);
                exit;
            }

            // Kontrola, či sa aktuálna URL ZHODUJE s cieľovou konfiguráciou
            $currentDomainNP = $this->domainNP ?? $_SERVER['HTTP_HOST'];
            $currentDomainWww = $this->domainWww ?? str_starts_with($currentDomainNP, 'www.');

            if ($this->originProtocol === $data['protocol'] &&
                $currentDomainNP === $wwwPrefix . $data['domain'] &&
                ($this->route(0) === $language || $language === '') &&
                $currentDomainWww === $data['www']) {
                return;
            }

            // Presmerovanie na cieľovú doménu (ak má byť zobrazená skutočná URL)
            if ($this->showRealUrl ?? true) {
                
                $newDomainPath = $targetDomain;
                
                if ($language && ($wwwPathNormalized !== $dbDomainNormalized)) {
                    $newDomainPath .= '/' . $language . $this->requestNoLang;
                } else {
                    $newDomainPath .= $this->requestNoLang;
                }
                
                if (rtrim($currentUrl, '/') !== rtrim($newDomainPath, '/')) {
                     $this->redirect($newDomainPath);
                     exit;
                }
            }
            
        } else {
            // 3. Logika presmerovania na lokálnu/základnú doménu ($toDbDomain je false)
            
            $data = $this->domainParser(defined('WWW_PATH') ? WWW_PATH : $wwwPath);
            $targetDomain = $data['protocol'] . $data['domain'];
            
            // Presmerovanie z default lang na no-lang (ak nie je RPC volanie)
            if ($currentLang == $language && $data['lang'] === false && $this->rpc === null) {
                $newDomain = $targetDomain . $this->requestNoLang;
                $this->redirect($newDomain);
                exit;
            } 
            
            // Presmerovanie na základnú doménu bez jazyka v ceste
            $newDomain = $targetDomain . $this->requestNoLang;
            
            if (rtrim($currentUrl, '/') != rtrim($newDomain, '/')) {
                $this->redirect($newDomain);
                exit;
            }
            
        }
    }

    public function init()
    {
        if (!$this->init) {
            $this->rootDomainParser();
            $this->rpc();
            $this->clients();
            $this->url();
            $this->id();
            $this->loadSettings();
            $this->route(false);
        }
    }
}
