<?php

namespace DntApi;

use DntLibrary\Base\Mailer;
use DntLibrary\Base\Rest;

class MailerServiceApi
{
    public function __construct()
    {
        $this->mailer = new Mailer();
        $this->rest = new Rest();
    }

    public function run()
    {
        #DEFAULT
        $config['senderEmail'] = $this->rest->post('senderEmail');
        $config['senderName'] = $this->rest->post('senderName');
        $config['recipientEmail'] = $this->rest->post('recipientEmail');
        $config['recipientName'] = $this->rest->post('recipientName');
        $config['message'] = $this->rest->post('message');
        $config['subject'] = $this->rest->post('subject');
        #METHOD
        $config['method'] = $this->rest->post('method');

        #ATTACHAMENT use stringAttachment or attachment
        if ($this->rest->post('attachment')) {
            $config['attachment'] = $this->rest->post('attachment');
        }
        if ($this->rest->post('stringAttachment')) {
            $config['stringAttachment'] = $this->rest->post('stringAttachment');
        }

        #SENGRID
        if ($this->rest->post('method') == 'SendGridV2' || $this->rest->post('method') == 'SendGridV3') {
            $config['send_grid_api_key'] = $this->rest->post('send_grid_api_key');
            $config['send_grid_api_template_id'] = $this->rest->post('send_grid_api_template_id');
        }

        #SMTP
        if ($this->rest->post('method') == 'Smtp') {
            $config['host'] = $this->rest->post('host');
            $config['username'] = $this->rest->post('username');
            $config['password'] = $this->rest->post('password');
        }

        if ($this->rest->post('senderEmail') && $this->rest->post('recipientEmail') && $this->rest->post('message') && $this->rest->post('subject') && $this->rest->post('method')) {
            $this->mailer->sent($config);
            $response = [
                'success' => 1,
                'data' => $config,
            ];
        } else {
            $response = [
                'success' => 0,
                'data' => $config,
            ];
        }
        print(json_encode($response));
    }
}
