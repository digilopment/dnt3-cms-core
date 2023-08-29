<?php

/**
 *  class       MessengerBot
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */

namespace DntLibrary\Base;

use DntLibrary\Base\Settings;

class MessengerBot
{

    public $bot_access;
    public $input;
    public $response;
    public $answer;
    public $bot_param;
    public $param;
    public $result;

    /**
     * 
     */
    public function __construct()
    {
        $this->settings = new Settings();
        $this->hubVerifyToken = $this->settings->get("msg_hub_verify_token");
        $this->accessToken = $this->settings->get("msg_access_token");
    }

    /**
     * 
     */
    public function init()
    {
        if ($_REQUEST['hub_verify_token'] === $this->hubVerifyToken) {
            echo $_REQUEST['hub_challenge'];
            exit;
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $senderId = $input['entry'][0]['messaging'][0]['sender']['id'];
        $messageText = $input['entry'][0]['messaging'][0]['message']['text'];
        $answer = "Čafte developeri :D 'hi'.";



        if ($messageText == "hi") {
            $answer = "Hello";
        }
        $response = [
            'recipient' => ['id' => $senderId],
            'message' => ['text' => $answer]
        ];

        $ch = curl_init('https://graph.facebook.com/v2.6/me/messages?access_token=' . $this->accessToken);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_exec($ch);
        curl_close($ch);
    }

    /**
     * 
     * @return boolean
     */
    public function equalHubToken()
    {

        if (isset($_REQUEST['hub_verify_token'])) {
            if ($_REQUEST['hub_verify_token'] === $this->hubVerifyToken) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $response
     */
    public function connection($response)
    {
        $this->bot_access = curl_init('https://graph.facebook.com/v2.6/me/messages?access_token=' . $this->accessToken);
        curl_setopt($this->bot_access, CURLOPT_POST, 1);
        curl_setopt($this->bot_access, CURLOPT_POSTFIELDS, json_encode($response));
        curl_setopt($this->bot_access, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_exec($this->bot_access);
        curl_close($this->bot_access);
    }

    /**
     * 
     * @param type $param
     * @return type
     * 
     * "param interface"
     * "first_name"
     * "last_name"
     * "profile_pic"
     * "locale"
     * "timezone"
     * "gender"
     * 
     * 
     */
    public function getUserParam($param)
    {
        $userId = $this->getSenderId();

        $this->bot_param = curl_init();
        curl_setopt($this->bot_param, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->bot_param, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->bot_param, CURLOPT_URL, 'https://graph.facebook.com/v2.6/' . $userId . '?fields=first_name,last_name&access_token=' . $this->accessToken . '');
        $this->result = curl_exec($this->bot_param);
        curl_close($this->bot_param);

        $this->param = json_decode($this->result);
        return @$this->param->$param;
    }

    /**
     * 
     * @return type
     */
    public function getSenderId()
    {
        $this->input = json_decode(file_get_contents('php://input'), true);
        return $this->input['entry'][0]['messaging'][0]['sender']['id'];
    }

    /**
     * 
     * @return type
     */
    public function getMessage()
    {
        $this->input = json_decode(file_get_contents('php://input'), true);
        return $this->input['entry'][0]['messaging'][0]['message']['text'];
    }

    /**
     * 
     * @param type $time
     */
    public function timeout($time)
    {
        sleep($time);
    }

    /**
     * 
     * @param type $answer
     * @return type
     */
    public function addUI($answer)
    {
        //return $this->mainUI($answer);
        return "Ahoj";
    }

    /**
     * 
     * @param type $answer
     */
    public function getResponse($answer)
    {

        if (!$this->equalHubToken()) {

            $this->mark_seen = array(
                "recipient" => array('id' => $this->getSenderId()),
                "sender_action" => "mark_seen",
            );

            $this->typing_on = array(
                "recipient" => array('id' => $this->getSenderId()),
                "sender_action" => "typing_on",
            );
            $this->typing_off = array(
                "recipient" => array('id' => $this->getSenderId()),
                "sender_action" => "typing_off",
            );

            $this->response = array(
                "recipient" => array('id' => $this->getSenderId()),
                "message" => array('text' => $answer),
            );

            //add log to database
            $log = new Log;
            $log->add("", $this->getSenderId(), $this->getMessage(), $answer, "NOW()");
            $log->addVendor($this->getSenderId(), $this->getUserParam("first_name"), $this->getUserParam("last_name"), $this->getUserParam("profile_pic"), $this->getUserParam("gender"));

            //creat all async post request "seen"
            $this->connection($this->mark_seen);
            $this->timeout(3);

            //creat all async post request "typing_on"
            $this->connection($this->typing_on);
            $this->timeout(5);

            //creat all async post request "typing_off"
            $this->connection($this->typing_off);
            $this->timeout(0.1);

            //creat all async post request "response message"
            $this->connection($this->response);
        } else {
            exit;
        }
    }

    /**
     * 
     * @param type $answer
     * @param type $senderId
     */
    public function getResponseTrigger($answer, $senderId)
    {

        if (!$this->equalHubToken()) {
            $this->response = array(
                "recipient" => array('id' => $senderId),
                "sender_actio" => "typing_on",
                "message" => array('text' => $answer),
            );

            $log = new Log;
            $log->add("25", $this->getSenderId(), $this->getMessage(), $answer, "NOW()");

            $this->connection($this->response);
        } else {
            exit;
        }
    }

    /**
     * 
     * @return type
     */
    public function run()
    {
        return $this->getResponse($this->addUI($this->getMessage()));
    }

}
