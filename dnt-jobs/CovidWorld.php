<?php

class CovidWorldJob
{

    protected $serviceUrl = 'https://www.worldometers.info/coronavirus/';
    protected $json;
    protected $dnt;
    protected $firstCovidCase = 0;

    public function __construct()
    {
        $this->getData();
    }

    protected function getData()
    {
        $this->dnt = new Dnt();
        $content = file_get_contents($this->serviceUrl);
        $this->content = $content;
    }

    protected function translate()
    {
        $words = [
            'country-other' => 'Krajina',
            'totalcases' => 'Počet infikovaných',
            'newcases' => 'Nové infikácie',
            'totaldeaths' => 'Počet úmrtí',
            'totalrecovered' => 'Počet vyliečených',
            'newdeaths' => 'Počet nových úmrtí',
            'activecases' => 'Aktívne prípady',
            'serious-critical' => 'Kritické prípady',
            'tot-cases-1m-pop' => 'Počet prípadov na 1 milión populácie',
            'deaths-1m-pop' => 'Počet úmrtí na na 1 milión populácie',
            'reported1st-case' => 'Prvý prípad nákazy'
        ];
        return $words;
    }

    protected function getTable($data)
    {
        $data = explode('main_table_countries_today', $data);
        $data = $data[1];
        $data = explode('</table>', $data);
        $data = $data[0];
        $content = '<table id="main_table_countries_today' . $data . '</table>';
        return $content;
    }

    protected function replaceValue($value)
    {
        $value = str_replace(',', '', trim($value));
        $value = str_replace('+', '', $value);
        return $value;
    }

    public function covidData()
    {
        $content = $this->getTable($this->content);
        $DOM = new DOMDocument();
        @$DOM->loadHTML($content);
        $Header = $DOM->getElementsByTagName('th');
        $Detail = $DOM->getElementsByTagName('td');

        foreach ($Header as $NodeHeader) {
            $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
        }

        $i = 0;
        $j = 0;
        $index = 0;
        $aDataTableDetailHTML = [];
        foreach ($Detail as $sNodeDetail) {
            $aDataTableDetailHTML[$j][$this->dnt->name_url($aDataTableHeaderHTML[$index])] = [
                'name_origin' => $aDataTableHeaderHTML[$index],
                'name' => $this->translate()[$this->dnt->name_url($aDataTableHeaderHTML[$index])],
                'value' => $this->replaceValue($sNodeDetail->textContent)
            ];

            $i = $i + 1;
            $j = $i % count($aDataTableHeaderHTML) == 0 ? $j + 1 : $j;
            $index = $i % count($aDataTableHeaderHTML) == 0 ? 0 : $index + 1;
        }
        return $aDataTableDetailHTML;
    }

    public function run()
    {
        $response = json_encode($this->covidData());
        file_put_contents('data/covidWorld.json', $response);
        print json_encode($response);
    }

}
