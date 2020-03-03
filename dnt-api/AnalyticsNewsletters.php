<?php

class AnalyticsNewslettersApi extends DntLog
{

    protected $rest;
    protected $availableStatus = [
        'newsletter_log_click',
        'newsletter_log_seen',
    ];

    public function __construct()
    {
        $this->rest = new Rest();
        $this->dnt = new Dnt();
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
                'email' => $this->dnt->hexToStr($this->rest->get('email')),
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
            if ($systemStatus == 'newsletter_log_seen') {
                print(time());
            }
        }
    }

}
