<?php

class CovidApi
{

    protected $serviceUrl = 'https://ezdravie.nczisk.sk/webapi/v1/kpi';
    protected $json;

    public function __construct()
    {
        $this->getData();
    }

    protected function getData()
    {

        $content = file_get_contents($this->serviceUrl);
        $this->json = json_decode($content, true);
    }

    public function covidData()
    {
        $final = [];
        $i = 0;
        foreach ($this->json['tiles'] as $single) {

            $lastDay = count($single['data']['d']) - 1;
            switch ($i) {
                case 0:
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
                case 1:
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
                case 2:
                    $final['recovered'] = [
                        'name' => $single['name'],
                        'updated' => $single['updated'],
                        'updatedFormated' => date_format(date_create($single['updated']), 'd.m.Y'),
                        'customName' => 'Počet vyliečených pacientov',
                        'latest' => $single['data']['d'][$lastDay]['v'],
                        'previous' => $single['data']['d'][$lastDay - 1]['v'],
                        'new' => $single['data']['d'][$lastDay - 1]['v'] - $single['data']['d'][$lastDay]['v']
                    ];
                    break;
                case 3:
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
