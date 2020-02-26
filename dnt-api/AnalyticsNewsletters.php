<?php

class AnalyticsNewslettersApi extends DntLog
{

    protected $rest;
    protected $availableStatus = [
        'newsletter_log_click',
        'newsletter_log_delivered',
    ];

    public function __construct()
    {
        $this->rest = new Rest();
        $this->dnt = new Dnt();
    }

    protected function strToHex($string)
    {
        $hex = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $hex .= dechex(ord($string[$i]));
        }
        return $hex;
    }

    protected function hexToStr($hex)
    {
        $string = '';
        for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
            $string .= chr(hexdec($hex[$i] . $hex[$i + 1]));
        }
        return $string;
    }

    public function run()
    {
        $systemStatus = $this->rest->get('systemStatus');

        if (in_array($systemStatus, $this->availableStatus)) {

            $url = urldecode($this->rest->get('url'));

            $data = [
                'campainId' => $this->rest->get('campainId'),
                'clickedId' => $this->rest->get('clickedId'),
                'redirectTo' => $url,
                'email' => $this->hexToStr($this->rest->get('email')),
                'systemStatus' => $systemStatus,
            ];

            $arr = [
                'force_log' => true,
                'msg' => json_encode($data),
                'system_status' => $data['systemStatus'],
                'status' => http_response_code(),
            ];

            $this->add($arr);
            if ($systemStatus == 'newsletter_log_click') {
                $this->dnt->redirect($url);
            }
        }
    }

}
