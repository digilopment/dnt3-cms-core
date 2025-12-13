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
     * Metóda pre správu domén a presmerovaní (redirects)
     * 
     * Táto metóda zabezpečuje správne presmerovanie používateľov na správnu doménu
     * podľa nastavení v administrácii. Podporuje multi-domain setup, multi-language
     * presmerovania a ochranu pred nekonečnými redirectmi.
     * 
     * @param string $dbDomain Externá doména z databázy (real_url z tabuľky dnt_vendors)
     * @param string $wwwPath Aktuálna WWW_PATH konštanta
     * @param bool $toDbDomain Smer presmerovania: true = na externú doménu, false = na internú doménu
     * @param string|false $language Kód jazyka (napr. 'sk', 'en') alebo false ak nie je multi-language
     * 
     * @return array Debug informácie obsahujúce:
     *   - 'branch': Ktorá vetva sa vykonala ('toDbDomain_true' alebo 'toDbDomain_false')
     *   - 'status': Aktuálny stav presmerovania
     *   - 'final_status': Finálny stav
     *   - 'final_redirect_url': URL na ktorú sa presmeruje (alebo null)
     *   - Ďalšie debug informácie (current_url, target_url, parsed_data, atď.)
     * 
     * @see Nastavenie v administrácii:
     *   1. Prihlásiť sa do administrácie: /dnt-admin/
     *   2. Prejsť na: Moduly → Vendor (Klienti)
     *   3. Kliknúť na ikonu editácie (modrý ceruzka) pri konkrétnom klientovi
     *   4. V modálnom okne nastaviť:
     *      - "Zobraziť na vlastnej adrese": Zapnúť/Vypnúť (show_real_url)
     *      - "Vlastná URL adresa": Zadať externú doménu (napr. http://kilpi.localhost/dnt3-winprizes)
     *   5. Uložiť zmeny
     * 
     * @see Možné stavy (status):
     *   - 'no_redirect': Žiadny redirect sa nevykoná
     *   - 'default_lang_to_no_lang': Presmerovanie z default jazyka na verziu bez jazyka
     *   - 'already_on_correct_domain': Už sme na správnej doméne, neredirectujeme
     *   - 'showRealUrl_with_language': Presmerovanie na externú doménu s jazykom
     *   - 'showRealUrl_without_language_redirect_to_base': Presmerovanie na základnú URL bez jazyka
     *   - 'showRealUrl_without_language_redirect_to_dbDomain': Presmerovanie na dbDomain tak ako je
     *   - 'showRealUrl_already_on_target_url': Už sme na cieľovej URL, neredirectujeme
     *   - 'lang_removal': Odstránenie jazyka z URL
     *   - 'default_redirect': Default redirect
     * 
     * @example Príklad 1: Základné presmerovanie na externú doménu
     *   Nastavenie v admin:
     *   - "Zobraziť na vlastnej adrese": ZAPNUTÉ
     *   - "Vlastná URL adresa": http://kilpi.localhost/dnt3-winprizes
     *   
     *   Výsledok:
     *   - URL: http://localhost/dnt3-winprizes/sk/intro
     *   → Presmeruje na: http://kilpi.localhost/dnt3-winprizes/
     * 
     * @example Príklad 2: Presmerovanie s jazykom
     *   Nastavenie v admin:
     *   - "Zobraziť na vlastnej adrese": ZAPNUTÉ
     *   - "Vlastná URL adresa": http://kilpi.localhost/dnt3-winprizes
     *   - Multi-language: ZAPNUTÉ, default jazyk: 'sk'
     *   
     *   Výsledok:
     *   - URL: http://localhost/dnt3-winprizes/sk/intro
     *   → Presmeruje na: http://kilpi.localhost/dnt3-winprizes/intro
     * 
     * @example Príklad 3: Odstránenie default jazyka z URL
     *   Nastavenie v admin:
     *   - Multi-language: ZAPNUTÉ, default jazyk: 'sk'
     *   - "Vlastná URL adresa": http://kilpi.localhost/dnt3-winprizes (bez jazyka)
     *   
     *   Výsledok:
     *   - URL: http://kilpi.localhost/dnt3-winprizes/sk/intro
     *   → Presmeruje na: http://kilpi.localhost/dnt3-winprizes/intro
     * 
     * @example Debugovanie:
     *   // Odkomentovať riadky 445-446 v metóde pre debug output:
     *   // var_dump($debugInfo);
     *   // exit;
     *   
     *   Alebo zachytiť návratovú hodnotu:
     *   $debugInfo = $client->setDomain($dbDomain, $wwwPath, $toDbDomain, $language);
     *   var_dump($debugInfo);
     * 
     * @throws Die s chybovou hláškou ak je toDbDomain=true ale dbDomain je prázdny
     */
    public function setDomain($dbDomain, $wwwPath, $toDbDomain = true, $language = false)
    {
        $redirectUrl = null;
        $debugInfo = [];
        $status = 'no_redirect';
        
        if ($toDbDomain || $dbDomain == $wwwPath || $dbDomain == rtrim($wwwPath . $this->urlLang(), '/')) {
            if ($toDbDomain && empty($dbDomain)) {
                die('<h2>Externá doména neexistuje, alebo nie je priradená k webu.</h2>Prosím vypnite v nastaveniach permanentné presmerovanie na externú doménu, alebo pridajte externú doménu.');
            }
            
            $data = $this->domainParser($dbDomain);
            $www = $data['www'] ? 'www.' : '';
            
            $debugInfo['branch'] = 'toDbDomain_true';
            $debugInfo['dbDomain'] = $dbDomain;
            $debugInfo['wwwPath'] = $wwwPath;
            $debugInfo['toDbDomain'] = $toDbDomain;
            $debugInfo['language'] = $language;
            $debugInfo['parsed_data'] = $data;
            $debugInfo['www'] = $www;
            $debugInfo['urlLang'] = $this->urlLang($this->request);
            $debugInfo['request'] = $this->request;
            $debugInfo['requestNoLang'] = $this->requestNoLang;
            $debugInfo['showRealUrl'] = $this->showRealUrl;
            $debugInfo['originProtocol'] = $this->originProtocol;
            $debugInfo['domainNP'] = $this->domainNP;
            $debugInfo['domainWww'] = $this->domainWww;
            $debugInfo['rpc'] = $this->rpc;
            $debugInfo['route_0'] = $this->route(0);
            $debugInfo['MULTY_LANGUAGE'] = defined('MULTY_LANGUAGE') ? MULTY_LANGUAGE : false;

            // Presmerovanie z default lang na no-lang
            if ($this->urlLang($this->request) == $language && 
                $data['lang'] == false && 
                $this->rpc === null && 
                MULTY_LANGUAGE === true) {
                
                $redirectUrl = $data['protocol'] . $www . $data['domain'] . $this->requestNoLang;
                $status = 'default_lang_to_no_lang';
                $debugInfo['status'] = $status;
                $debugInfo['redirect_url'] = $redirectUrl;
            }
            // Kontrola či už sme na správnej doméne (ak áno, neredirectujeme)
            elseif ($this->originProtocol == $data['protocol'] &&
                    $this->domainNP == $www . $data['domain'] &&
                    ($this->route(0) == $language || $language == '') &&
                    $this->domainWww == $data['www']) {
                
                $status = 'already_on_correct_domain';
                $debugInfo['status'] = $status;
                $redirectUrl = null;
            }
            // Presmerovanie na real URL ak je zapnuté
            elseif ($this->showRealUrl) {
                if ($language && (rtrim(WWW_PATH, '/') != rtrim($dbDomain, '/'))) {
                    // Presmerovanie s jazykom
                    $targetUrl = $dbDomain . '/' . $this->requestNoLang;
                    $status = 'showRealUrl_with_language';
                    $debugInfo['status'] = $status;
                    $debugInfo['target_url'] = $targetUrl;
                } else {
                    // Presmerovanie bez jazyka
                    $dbDomainNormalized = rtrim($dbDomain, '/');
                    $baseUrl = $data['protocol'] . $www . $data['domain'];
                    $baseUrlNormalized = rtrim($baseUrl, '/');
                    
                    $debugInfo['dbDomain'] = $dbDomain;
                    $debugInfo['dbDomain_normalized'] = $dbDomainNormalized;
                    $debugInfo['baseUrl'] = $baseUrl;
                    $debugInfo['baseUrl_normalized'] = $baseUrlNormalized;
                    
                    // Ak dbDomain je len základná URL (rovná sa baseUrl), presmeruj na základnú URL
                    if ($dbDomainNormalized === $baseUrlNormalized) {
                        $targetUrl = $baseUrl . '/';
                        $status = 'showRealUrl_without_language_redirect_to_base';
                        $debugInfo['status'] = $status;
                        $debugInfo['target_url'] = $targetUrl;
                    } else {
                        // Ak dbDomain obsahuje cestu, použij dbDomain tak ako je
                        $targetUrl = $dbDomain;
                        $status = 'showRealUrl_without_language_redirect_to_dbDomain';
                        $debugInfo['status'] = $status;
                        $debugInfo['target_url'] = $targetUrl;
                    }
                }
                
                // Kontrola či už sme na cieľovej URL (aby sa zabránilo nekonečnému redirectu)
                $currentUrl = $this->originProtocol . ($this->domainWww ? 'www.' : '') . $this->domainNP . $this->request;
                $targetUrlNormalized = rtrim($targetUrl, '/');
                $currentUrlNormalized = rtrim($currentUrl, '/');
                
                $debugInfo['current_url'] = $currentUrl;
                $debugInfo['current_url_normalized'] = $currentUrlNormalized;
                $debugInfo['target_url_normalized'] = $targetUrlNormalized;
                
                // Ak už sme na cieľovej URL, neredirectujeme
                if ($currentUrlNormalized === $targetUrlNormalized) {
                    $status = 'showRealUrl_already_on_target_url';
                    $debugInfo['status'] = $status;
                    $redirectUrl = null;
                } else {
                    $redirectUrl = $targetUrl;
                }
            }
        } else {
            // Presmerovanie z dbDomain na wwwPath
            if ($toDbDomain == false) {
                $data = $this->domainParser(WWW_PATH);
                
                $debugInfo['branch'] = 'toDbDomain_false';
                $debugInfo['WWW_PATH'] = WWW_PATH;
                $debugInfo['parsed_data'] = $data;
                $debugInfo['urlLang'] = $this->urlLang($this->request);
                $debugInfo['language'] = $language;
                $debugInfo['requestNoLang'] = $this->requestNoLang;
                $debugInfo['rpc'] = $this->rpc;
                
                $redirectUrl = $data['protocol'] . $data['domain'] . $this->requestNoLang;
                if ($this->urlLang($this->request) == $language && 
                    $data['lang'] == false && 
                    $this->rpc === null) {
                    $status = 'lang_removal';
                } else {
                    $status = 'default_redirect';
                }
                $debugInfo['status'] = $status;
                $debugInfo['redirect_url'] = $redirectUrl;
            }
        }
        
        $debugInfo['final_status'] = $status;
        $debugInfo['final_redirect_url'] = $redirectUrl;
        
        // Debug output - odkomentovať pre debugovanie
        // var_dump($debugInfo);
        // exit;
        
        // Finálny redirect až na konci
        if ($redirectUrl !== null) {
            $this->redirect($redirectUrl);
            exit;
        }
        
        // Vrátiť debug info pre debugovanie (ak je potrebné)
        return $debugInfo;
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
