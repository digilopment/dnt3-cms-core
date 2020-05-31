<?php

/**
 * 
 * http://skeleton.localhost/dnt3/dnt-api/multi/xml/JajsZ5s4/1028
 * http://skeleton.localhost/dnt3/dnt-api/multi/json/?query=SELECT%20*%20FROM%20dnt_users
 *
 * */

namespace DntApi;

use DntLibrary\Base\Api;
use DntLibrary\Base\DntLog;
use DntLibrary\Base\Rest;
use Swoole\Http\Client;

class MultiApi
{

    public function run()
    {

        $rest = new Rest();
        $dntLog = new DntLog();
        $api = new Api;

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
