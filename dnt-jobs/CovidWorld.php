<?php

class CovidWorldJob
{

    protected $serviceUrl = 'https://www.worldometers.info/coronavirus/';
    protected $json;
    protected $covidData;
    protected $yesterdayCovidData;
    protected $finalData;
    protected $dnt;
    protected $firstCovidCase = 0;

    const TODAY = 'main_table_countries_today';
    const YESTERDAY = 'main_table_countries_yesterday';

    public function __construct()
    {
        $this->getData();
        $this->initYesterdayData();
        $this->finalData();
    }

    protected function getData()
    {
        $this->dnt = new Dnt();
        $content = file_get_contents($this->serviceUrl);
        $this->content = $content;
    }

    protected function clean($string)
    {
        return str_replace('-', '', $this->dnt->name_url($string));
    }

    protected function translate()
    {
        $words = [
            'countryother' => 'Krajina',
            'totalcases' => 'Počet infikovaných',
            'newcases' => 'Nové infikácie',
            'totaldeaths' => 'Počet úmrtí',
            'totalrecovered' => 'Počet vyliečených',
            'newdeaths' => 'Počet nových úmrtí',
            'activecases' => 'Aktívne prípady',
            'seriouscritical' => 'Kritické prípady',
            'totcases1mpop' => 'Počet prípadov na 1 milión populácie',
            'deaths1mpop' => 'Počet úmrtí na na 1 milión populácie',
            'reported1stcase' => 'Prvý prípad nákazy'
        ];
        return $words;
    }

    protected function getTable($tableId, $data)
    {
        $data = explode($tableId, $data);
        $data = $data[1];
        $data = explode('</table>', $data);
        $data = $data[0];
        $content = '<table id="' . $tableId . $data . '</table>';
        return $content;
    }

    protected function replaceValue($value)
    {
        $value = str_replace(',', '', trim($value));
        $value = str_replace('+', '', $value);
        return $value;
    }

    public function covidData($tableId)
    {
        $content = $this->getTable($tableId, $this->content);
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
            $aDataTableDetailHTML[$j][$this->clean($aDataTableHeaderHTML[$index])] = [
                'name_origin' => $aDataTableHeaderHTML[$index],
                'name' => $this->translate()[$this->clean($aDataTableHeaderHTML[$index])],
                'value' => $this->replaceValue($sNodeDetail->textContent)
            ];

            $i = $i + 1;
            $j = $i % count($aDataTableHeaderHTML) == 0 ? $j + 1 : $j;
            $index = $i % count($aDataTableHeaderHTML) == 0 ? 0 : $index + 1;
        }

        return $aDataTableDetailHTML;
    }

    protected function initYesterdayData()
    {
        $this->yesterdayCovidData = $this->covidData(self::YESTERDAY);
    }

    protected function addColumn($key, $name, $value)
    {
        return [
            'name_origin' => $name,
            'name' => $name,
            'value' => $value
        ];
    }

    protected function mortality($totalCases, $totalDeaths)
    {
        return round((float) $totalDeaths / (float) $totalCases * 100, 2);
    }

    protected function newRecovered($totalRecovered, $country)
    {
        $countryKey = $this->clean($country);
        $yesterdayCovidData = $this->yesterdayCovidData;
        $totalRecovered = (strlen($totalRecovered)) > 0 ? (int) $totalRecovered : 0;
         
        foreach ($yesterdayCovidData as $country) {
            if ($this->clean($country['countryother']['value']) == $countryKey) {
                $yesterdayRecovered = (strlen($country['totalrecovered']['value'])) > 0 ? (int) $country['totalrecovered']['value'] : 0;
                return $totalRecovered - $yesterdayRecovered;
            }
        }
        return $totalRecovered;
    }

    protected function finalData()
    {
        $response = [];
        $covidData = $this->covidData(self::TODAY);
        foreach ($covidData as $key1 => $column) {
            foreach ($column as $key2 => $row) {
                $response[$key1][$key2] = $row;
                $response[$key1]['mortality'] = $this->addColumn(
                        'mortality',
                        'Úmrtnosť',
                        $this->mortality($covidData[$key1]['totalcases']['value'], $covidData[$key1]['totaldeaths']['value'])
                );
                $response[$key1]['newrecovered'] = $this->addColumn(
                        'newrecovered',
                        'Noví vyliečení',
                        $this->newRecovered($covidData[$key1]['totalrecovered']['value'], $covidData[$key1]['countryother']['value'])
                );
            }
        }
        $this->finalData = $response;
    }

    public function run()
    {
        $response = json_encode($this->finalData);
        file_put_contents('data/covidWorld.json', $response);
        print $response;
    }

}
