<?php

namespace DntTest;

use DntLibrary\Base\Dnt;

class LogSeenFakerTest
{
    protected $dnt;

    public function __construct()
    {
        $this->dnt = new Dnt();
    }

    protected function strToHex($string)
    {
        $hex = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $ord = ord($string[$i]);
            $hexCode = dechex($ord);
            $hex .= substr('0' . $hexCode, -2);
        }
        return str_replace('0d', '', $hex);
    }

    protected function csv_to_array($filename)
    {
        $exoplode = 'gmail.com';
        $list = explode($exoplode, file_get_contents($filename));
        $final = [];
        foreach ($list as $item) {
            $email = $item . $exoplode;
            $final[] = $email;
        }
        return $final;
    }

    public function run()
    {
        $emails = $this->csv_to_array('data/available.csv');
        $campainId = 'voyo-novevoyo-newsletter-2020-12-10';
        foreach ($emails as $email) {
            $emailHex = $this->strToHex($email);
            $url = 'https://markiza.digilopment.com/dnt-api/analytics-newsletters?systemStatus=newsletter_log_seen&campainId=' . $campainId . '&email=' . $emailHex;
            //file_get_contents($url);
        }
    }
}
