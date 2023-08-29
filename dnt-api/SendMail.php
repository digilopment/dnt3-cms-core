<?php

namespace DntApi;

use DntLibrary\Base\Rest;

class SendMailApi
{
    protected $dnt;

    public function __construct()
    {
        $this->rest = new Rest();
    }

    public function pripare()
    {
        if ($this->rest->get('fromEmail')) {
            $this->fromEmail = urldecode($this->rest->get('fromEmail'));
        }
        if ($this->rest->get('fromName')) {
            $this->fromName = urldecode($this->rest->get('fromName'));
        }
        if ($this->rest->get('toEmail')) {
            $this->toEmail = urldecode($this->rest->get('toEmail'));
        }
        if ($this->rest->get('subject')) {
            $this->subject = urldecode($this->rest->get('subject'));
        }
        /*$this->fromEmail = "golmesiaca@markiza.sk";
        $this->fromName = "TV Markíza";
        $this->toEmail = "popovic.michal@gmail.com";
        $this->subject = "Voyo Novinky";
        */
    }

    public function content($confirmUrl)
    {
        $this->content = '<!DOCTYPE html><html> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> </head> <body style="font-family: Arial, Serif; max-width: 800px;font-family: Roboto, sans-serif;font-weight: 300;text-align: center;font-size: 1.0em;"> <article class="thx_cont" style="max-width: 800px; height: 850px; margin: 0 auto;"><section><div class="thx_head" style="background: url(https://varenypeceny.markiza.sk/dnt-markiza/forms/media/gol-mesiaca/img/mail-header.jpg); max-width: 800px; height: 65px;">&nbsp;</div><div class="thx_like" style="background: url(https://varenypeceny.markiza.sk/dnt-markiza/forms/media/calendar-templates/2020/img//like.png); width: 98px; height: 98px; margin: 30px auto;">&nbsp;</div></section><section><div class="thx_content"><h1 style="font-size: 2.3em; font-weight: 300;">Ďakujeme,</h1><p style="font-size: 1.3em; font-weight: 100; padding: 0px 0 10px 0;">že ste sa zapojili do ankety &bdquo;<strong>G&oacute;l mesiaca</strong>&ldquo;!<br/><br/>V&aacute;&scaron; hlas sme zaregistrovali, ale pre jeho &uacute;spe&scaron;n&eacute; započ&iacute;tanie potrebujeme, aby ste overili svoju emailov&uacute; adresu.</p><p style="font-size: 1.3em; font-weight: 100; padding: 0px 0 10px 0;"><a href="' . $confirmUrl . '" target="_blank"><strong>OVERIŤ EMAILOV&Uacute; ADRESU</strong></a>&nbsp;<br/><br/></p><hr style="border: 1px solid #DADADA;"/></div></section><section class="footer_place" style="margin: 0px;"><div class="logo_markiza_footer">&nbsp;</div><div class="first_line"><ul style="margin: 10px 0 0 0; background: #eaeaea; padding: 10px; text-align: center; font-family: font-awesome;"><li style="font-size: 0.9em; font-weight: 300; padding: 0px 0 10px 0; display: inline;"><a style="font-size: 0.8em; padding: 0px 0 10px 0; text-decoration: none; color: #005890;" href="https://markiza.sk/" target="_blank">markiza.sk</a> |</li><li class="fa fa-facebook-square fa-lg" style="color: #4e6b9f; font-size: 0.9em; font-weight: 300; padding: 0px 0 10px 0; display: inline; font: normal normal normal 14px/1 FontAwesome; text-rendering: auto; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; line-height: .75em; vertical-align: -15%;"><a style="font-size: 0.8em; font-weight: 300; padding: 0px 0 10px 0; text-decoration: none; color: #005890;" href="https://www.facebook.com/TeleviziaMarkiza" target="_blank"><img style="margin-bottom: -3px;" src="https://varenypeceny.markiza.sk/dnt-markiza/forms/media/calendar-templates/2020/img/ico-fb.png" alt=""/> tvmarkiza </a> |</li><li class="fa fa-youtube-square fa-lg" style="color: #009ee3;font-size: 0.9em; font-weight: 300; padding: 0px 0 10px 0; display: inline; font: normal normal normal 14px/1 FontAwesome; text-rendering: auto; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; line-height: .75em; vertical-align: -15%;"><a style="font-family: Roboto; font-size: 0.8em; font-weight: 300; padding: 0px 0 10px 0; text-decoration: none; color: #005890;" href="https://www.youtube.com/channel/UCIAAI5FnphpbEYVdpuB2CHg" target="_blank"><img style="margin-bottom: -3px;" src="https://varenypeceny.markiza.sk/dnt-markiza/forms/media/calendar-templates/2020/img/ico-yt.png" alt=""/> tvmarkiza</a> |</li><li class="fa fa-instagram fa-lg" style="font-family: Roboto; font-size: 0.9em; font-weight: 300; padding: 0px 0 10px 0; display: inline; font: normal normal normal 14px/1 FontAwesome; text-rendering: auto; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; line-height: .75em; vertical-align: -15%;"><a style="font-family: Roboto; font-size: 0.8em; font-weight: 300; padding: 0px 0 10px 0; text-decoration: none; color: #005890;" href="https://www.instagram.com/tvmarkizaofficial/?hl=sk" target="_blank"><img style="margin-bottom: -3px;" src="https://varenypeceny.markiza.sk/dnt-markiza/forms/media/calendar-templates/2020/img/ico-insta.png" alt=""/> @tvmarkizaofficial</a></li></ul></div><div class="sec_line" style="background: #d0d0d0;"><p style="font-size: 0.8em; font-weight: 300; padding: 10px; text-align: center; max-width: 800px; margin: 0 auto;">&copy; MARK&Iacute;ZA - SLOVAKIA, spol. s r.o., Bratislavsk&aacute; 1/a, 843 56 Bratislava</p></div></section></article> </body></html>';
    }

    public function run()
    {
        $domain = $this->rest->get('confirmUrl');
        $confirmUrl = $domain . '?signature=' . $this->rest->get('signature') . '&time_signature=' . $this->rest->get('time_signature') . '&round_id=' . $this->rest->get('round_id');
        /*echo "<br/>";
        echo "<br/>";
        echo "<br/>";
        echo base64_decode('aHR0cHM6Ly9nb2xtZXNpYWNhLm1hcmtpemEuc2svcG90dnJkZW5pZS1lbWFpbG92ZWotYWRyZXN5P3NpZ25hdHVyZT1mOWM1YmJjNzE2N2Y4ZmVkYjI2ZjJlM2Y2YzMzOTI2MSZyb3VuZF9pZD0yMDM3NTA3MjAzNzUwODIwMzc1MDkyMDM3NTEwMjAzNzUxMQ==');

        exit;*/
        $this->pripare();
        $this->content($confirmUrl);

        $SEND_GRID_API_TEMPLATE_ID = SEND_GRID_API_TEMPLATE_ID;
        $YOUR_API_KEY = SEND_GRID_API_KEY;
        $params = [
            'from' => [
                'email' => $this->fromEmail,
                'name' => $this->fromName,
            ],
            'subject' => $this->subject,
            'template_id' => $SEND_GRID_API_TEMPLATE_ID,
            'content' => [
                [
                    'type' => 'text/html',
                    'value' => $this->content,
                ],
            ],
            'personalizations' => [
                [
                    'to' => [
                        [
                            'email' => $this->toEmail,
                        ],
                    ],
                    'send_at' => time(),
                ],
            ],
            'tracking_settings' => [
                'click_tracking' => [
                    'enable' => false,
                    'enable_text' => false,
                ],
                'click_tracking' => [
                    'enable' => false,
                    'enable_text' => false,
                ],
            ],
        ];

        $data = json_encode($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sendgrid.com/v3/mail/send');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $headers = array();
        $headers[] = 'Authorization: Bearer ' . $YOUR_API_KEY;
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        var_dump($result);
        curl_close($ch);
    }
}
