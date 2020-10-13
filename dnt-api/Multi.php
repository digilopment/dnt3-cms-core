<?php

/**
 * 
 * http://skeleton.localhost/dnt3/dnt-api/multi/xml/JajsZ5s4/1028
 * http://skeleton.localhost/dnt3/dnt-api/multi/json/?query=SELECT%20*%20FROM%20dnt_users
 *
 * */

namespace DntApi;

use DntLibrary\App\Client;
use DntLibrary\Base\Api;
use DntLibrary\Base\DntLog;
use DntLibrary\Base\Rest;

class MultiApi
{

    public function run()
    {

        $rest = new Rest();
        $dntLog = new DntLog();
        $api = new Api();
        
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header('WWW-Authenticate: Basic dnt3Platform="20Dnt3Platform20"');
            header('HTTP/1.0 401 Unauthorized');

            if ($rest->webhook(3) == "xml") {
                header('Content-type: text/xml');
                echo '<?xml version="1.0" encoding="UTF-8"?>
                        <service>
                            <header>
                                <domain>' . DOMAIN . '</domain>
                                <engine>dnt3-platform</engine>
                                <TypeID>multi</TypeID>
                                <request>
                                    <code>HTTP/1.0 401 Unauthorized</code>
                                </request>
                            </header>
                            <message>Službu nebolo možné spustiť</message>
                        </service>';
            } else {
                header('Content-Type: application/json');
                echo '{"header": {"domain": "' . DOMAIN . '","engine": "dnt3-platform","TypeID": "multi","request": { "code": "HTTP/1.0 401 Unauthorized"}},"message": "Službu nebolo možné spustiť"}';
            }
            exit;
        }



        if ($rest->webhook(4) == "base64") {
            $query = urldecode(str_replace("==", "", base64_decode($rest->webhook(5))));
            $query = urldecode(base64_decode($rest->get("q")));
        } else {
            $query = $api->getQuery(
                    $rest->webhook(4),
                    $rest->webhook(5),
                    $rest->get("query")
            );
        }

        $client = new Client();
        $client->init();
        $dntLog->add(
                array(
                    "http_response" => 200,
                    "system_status" => "log",
                    "msg" => "Api log",
                )
        );
        if ($query) {
            if ($rest->webhook(3) == "xml") {
                header('Content-type: text/xml');
                $api->getXmlData($query);
                $type = "xml";
            } elseif ($rest->webhook(3) == "json") {
                header('Content-Type: application/json');
                $api->getJsonData($query);
                $type = "json";
            } else {
                $type = "no data";
            }
        } else {
            $type = "no query";
        }
    }

}
