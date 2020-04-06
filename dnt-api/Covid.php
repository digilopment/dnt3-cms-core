<?php

class CovidApi
{

    protected $serviceUrl = 'https://ezdravie.nczisk.sk/webapi/v1/kpi';

    const LOCAL_SERVICE_URL = 'https://www.tvnoviny.sk/clanok/1994138_korona-vidget';
    const TABLE = 'covid-slovensko';

    protected $json;
    protected $dnt;
    protected $firstCovidCase = 0;
    protected $dom;
    protected $localContent = null;
    protected $hasLocalData = null;

    public function __construct()
    {
        $this->dom = new DOMDocument();
        $this->dnt = new Dnt();
    }

    protected function init()
    {
        $this->loadLocalData();
        $this->getData();
        $this->findFirstCovidBox();
    }

    protected function clean($string)
    {
        return str_replace('-', '', $this->dnt->name_url($string));
    }

    protected function getTable($tableId, $data)
    {
        $tempArr = explode(self::TABLE, $data);
        if (!isset($tempArr[1])) {
            return null;
        }
        $parsed = explode('</table>', $tempArr[1]);
        $content = '<table id="' . $tableId . $parsed[0] . '</table>';
        return $content;
    }

    protected function getHttpResponseCode($url)
    {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    protected function loadLocalData()
    {
        $this->localContent = file_get_contents(self::LOCAL_SERVICE_URL . '?time=' . time());
        if (isset(explode(self::TABLE, $this->localContent)[1])) {
            $this->hasLocalData = true;
        }
    }

    protected function getValue($elementId, $clean = true)
    {
        $content = $this->getTable(self::TABLE, $this->localContent);
        @$this->dom->loadHTML($content);
        if ($clean) {
            return $this->clean($this->dom->getElementById($elementId)->textContent);
        }
        return $this->dom->getElementById($elementId)->textContent;
    }

    protected function getData()
    {
        $this->dnt = new Dnt();
        $content = file_get_contents($this->serviceUrl);
        $this->json = json_decode($content, true);
    }

    protected function findFirstCovidBox()
    {
        $i = 0;
        foreach ($this->json['tiles'] as $single) {
            if ($this->dnt->in_string('COVID-19', $single['name'])) {
                $this->firstCovidCase = $i;
                return;
            }
            $i++;
        }
    }

    protected function covidDataLocal()
    {
        $updated = $this->getValue('covid-updated-date', false) . ', ' . $this->getValue('covid-updated-time', false);

        $final['tested'] = [
            'updatedFormated' => $updated,
            'latest' => $this->getValue('covid-test-today'),
            'new' => $this->getValue('covid-test-new'),
        ];
        $final['infected'] = [
            'updatedFormated' => $updated,
            'latest' => $this->getValue('covid-infected-today'),
            'new' => $this->getValue('covid-infected-new'),
        ];

        $final['recovered'] = [
            'updatedFormated' => $updated,
            'latest' => $this->getValue('covid-recovered-today'),
            'new' => $this->getValue('covid-recovered-new'),
        ];
        $final['died'] = [
            'updatedFormated' => $updated,
            'latest' => $this->getValue('covid-died-today'),
            'new' => $this->getValue('covid-died-new'),
        ];
        return $final;
    }

    public function covidData()
    {
        $final = [];
        $i = 0;
        foreach ($this->json['tiles'] as $single) {
            $lastDay = count($single['data']['d']) - 1;
            switch ($i) {
                case $this->firstCovidCase:
                    $final['infected'] = [
                        'name' => $single['name'],
                        'updated' => $single['updated'],
                        'updatedFormated' => date_format(date_create($single['updated']), 'd.m.Y'),
                        'customName' => 'Počet pozitívnych vzoriek',
                        'latest' => $single['data']['d'][$lastDay]['v'],
                        'previous' => $single['data']['d'][$lastDay - 1]['v'],
                        'new' => $single['data']['d'][$lastDay]['v'] - $single['data']['d'][$lastDay - 1]['v'],
                    ];
                    break;
                case $this->firstCovidCase + 1:
                    $final['tested'] = [
                        'name' => $single['name'],
                        'updated' => $single['updated'],
                        'updatedFormated' => date_format(date_create($single['updated']), 'd.m.Y'),
                        'customName' => 'Počet negatívnych vzoriek',
                        'latest' => $single['data']['d'][$lastDay]['v'],
                        'previous' => $single['data']['d'][$lastDay - 1]['v'],
                        'new' => $single['data']['d'][$lastDay]['v'] - $single['data']['d'][$lastDay - 1]['v'],
                    ];
                    break;
                case $this->firstCovidCase + 2:
                    $final['recovered'] = [
                        'name' => $single['name'],
                        'updated' => $single['updated'],
                        'updatedFormated' => date_format(date_create($single['updated']), 'd.m.Y'),
                        'customName' => 'Počet vyliečených pacientov',
                        'latest' => $single['data']['d'][$lastDay]['v'],
                        'previous' => $single['data']['d'][$lastDay - 1]['v'],
                        'new' => $single['data']['d'][$lastDay]['v'] - $single['data']['d'][$lastDay - 1]['v']
                    ];
                    break;
                case $this->firstCovidCase + 3:
                    $final['died'] = [
                        'name' => $single['name'],
                        'updated' => $single['updated'],
                        'updatedFormated' => date_format(date_create($single['updated']), 'd.m.Y'),
                        'customName' => 'Počet úmrtí',
                        'latest' => $single['data']['d'][$lastDay]['v'],
                        'previous' => $single['data']['d'][$lastDay - 1]['v'],
                        'new' => $single['data']['d'][$lastDay]['v'] - $single['data']['d'][$lastDay - 1]['v'],
                    ];
                    break;
            }
            $i++;
        }
        return $final;
    }

    public function run()
    {
        $this->init();
        if ($this->hasLocalData) {
            print json_encode($this->covidDataLocal());
        } else {
            print json_encode($this->covidData());
        }
    }

}
