<?php

namespace DntApi;

use DntLibrary\Base\Dnt;
use DntLibrary\Base\DntLog;
use DntLibrary\Base\Rest;

class AnalyticsNewslettersApi extends DntLog
{

    protected $rest;
    protected $availableStatus = [
        'newsletter_log_click',
        'newsletter_log_seen',
    ];

    public function __construct()
    {
		parent::__construct();
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
			
			if($data['campainId'] == 'newsletter-qr-open-spring-2021'){
				$this->dnt->redirect('http://85.248.116.69/dnt-markiza/forms/?action=redirector&nameUrl=spring-claim-2021-pdf&v2=true');
				exit();
			}
			
            $this->add($arr);
            if ($systemStatus == 'newsletter_log_click') {
                $this->dnt->redirect($url);
            }
            if ($systemStatus == 'newsletter_log_seen') {
                header("Content-type: image/png");
                print(base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAAApJREFUCNdjYAAAAAIAAeIhvDMAAAAASUVORK5CYII='));
            }
        }
    }

}
