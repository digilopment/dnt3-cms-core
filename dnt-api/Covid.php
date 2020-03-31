<?php

class CovidApi
{

    protected $serviceUrl = 'https://ezdravie.nczisk.sk/webapi/v1/kpi';
    protected $json;
    protected $dnt;
    protected $firstCovidCase = 0;

    public function __construct()
    {
        $this->getData();
        $this->findFirstCovidBox();
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
        print json_encode($this->covidData());
    }

}
