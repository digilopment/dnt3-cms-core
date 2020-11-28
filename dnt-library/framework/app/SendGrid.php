<?php

namespace DntLibrary\App;

use DntLibrary\Base\Dnt;
use DntLibrary\Base\Settings;

class SendGrid
{

    protected $attachements = false;
    public $response = false;

    public function __construct()
    {
        $this->dnt = new Dnt();
        $this->settings = new Settings();
    }

    public function setup($data)
    {
        $this->senGridService = SEND_GRID_API_REQUEST;
        $this->senGridApiKey = $this->settings->get('send_grid_api_key');
        $this->senGridTemplateKey = $this->settings->get('send_grid_api_template_id');


        $data['js'] = array(
            'filters' => array(
                'templates' => array(
                    'settings' => array(
                        'enable' => 1,
                        'template_id' => $this->senGridTemplateKey
                    )
                )
            )
        );

        $this->to = $data['to'];
        $this->toName = $data['toName'];
        $this->from = $data['from'];
        $this->fromName = $data['fromName'];
        $this->subject = $data['subject'];
        $this->text = $this->dnt->not_html($data['message']);
        $this->html = $data['message'];
        $this->xSmtpApi = json_encode($data['js']);

        if (isset($data['attachements']) && count($data['attachements']) > 0) {
            $this->attachements = $data['attachements'];
        }
    }

    public function sent()
    {


        $files = [];
        if ($this->attachements) {
            foreach ($this->attachements as $fileName => $fileLocation) {
                if (file_exists($fileLocation)) {
                    $files['files[' . $fileName . ']'] = $fileLocation;
                }
            }
        }

        $assoc = [
            'to' => $this->to,
            'toname' => empty($this->toName) ? $this->to : $this->toName,
            'from' => $this->from,
            'fromname' => empty($this->fromName) ? $this->from : $this->fromName,
            'subject' => $this->subject,
            'text' => $this->text,
            'html' => $this->html,
            'x-smtpapi' => $this->xSmtpApi,
        ];

        $curlHandler = curl_init();
        $this->curlCustomPostfields($curlHandler, $assoc, $files);
        $response = curl_exec($curlHandler);
        $this->response = $response;
    }

    protected function curlCustomPostfields($ch, array $assoc = array(), array $files = array())
    {

        // invalid characters for "name" and "filename"
        $disallow = array('\0', '\"', '\r', '\n');

        // build normal parameters
        foreach ($assoc as $k => $v) {
            $k = str_replace($disallow, '_', $k);
            $body[] = implode("\r\n", array(
                'Content-Disposition: form-data; name="' . $k . '"',
                '',
                filter_var($v),
            ));
        }

        // build file parameters
        foreach ($files as $k => $v) {
            $data = file_get_contents($v);
            $k = str_replace($disallow, '_', $k);
            $v = str_replace($disallow, '_', $v);
            $body[] = implode("\r\n", array(
                'Content-Disposition: form-data; name="' . $k . '"; filename="' . $v . '"',
                '',
                $data,
            ));
        }

        // generate safe boundary
        do {
            $boundary = '---------------------' . md5(mt_rand() . microtime());
        } while (preg_grep('/' . $boundary . '/', $body));

        // add boundary for each parameters
        array_walk($body, function (&$part) use ($boundary) {
            $part = "--{$boundary}\r\n{$part}";
        });

        // add final boundary
        $body[] = "--{$boundary}--";
        $body[] = "";

        // set options
        return curl_setopt_array($ch, array(
            CURLOPT_URL => $this->senGridService,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => implode("\r\n", $body),
            CURLOPT_HTTPHEADER => array(
                'Content-length: ' . strlen(implode("\r\n", $body)),
                "Content-Type: multipart/form-data; boundary={$boundary}", // change Content-Type
                'Accept: application/json',
                'Authorization: Bearer ' . $this->senGridApiKey
            ),
        ));
    }

}
