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

    public function run()
    {
        $systemStatus = $this->rest->get('systemStatus');

        if (in_array($systemStatus, $this->availableStatus)) {
            $data = [
                'campainId' => $this->rest->get('campainId'),
                'clickedId' => $this->rest->get('clickedId'),
                'redirectTo' => $this->rest->get('url'),
                'email' => base64_decode($this->rest->get('email')),
                'systemStatus' => $systemStatus,
            ];

            $arr = [
                'force_log' => true,
                'msg' => json_encode($data),
                'system_status' => $data['systemStatus'],
                'status' => http_response_code(),
            ];

            $this->add($arr);
            $redirect = urldecode($this->rest->get('url'));
            if ($systemStatus == 'newsletter_log_click') {
                $this->dnt->redirect($redirect);
            }
        }
    }

}
