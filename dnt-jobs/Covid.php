<?php

namespace DntJobs;

use DntLibrary\Base\Dnt;
use DOMDocument;

class CovidJob
{

    //const LOCAL_SERVICE_URL = 'https://www.tvnoviny.sk/clanok/1994138_korona-vidget?data=1';
    const LOCAL_SERVICE_URL = 'https://varenypeceny.markiza.sk/dnt-markiza/forms/?action=covid-article';
    const LOCAL_TABLE = 'covid-slovensko';
    const STATIC_FILE = 'data/covid.json';

    protected $dnt;

    protected $dom;

    protected $json;

    protected $firstCovidCase = 0;

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
    }

    protected function clean($string)
    {
        return str_replace('-', '', $this->dnt->name_url($string));
    }

    protected function getTable($tableId, $data)
    {
        $tempArr = explode(self::LOCAL_TABLE, $data);
        if (!isset($tempArr[1])) {
            return null;
        }
        $parsed = explode('</table>', $tempArr[1]);
        $content = '<table id="' . $tableId . $parsed[0] . '</table>';
        return $content;
    }

    protected function dataToJson($array)
    {
        return json_encode($array);
    }

    protected function loadLocalData()
    {
        $this->localContent = file_get_contents(self::LOCAL_SERVICE_URL . '&time=' . time());
        if (isset(explode(self::LOCAL_TABLE, $this->localContent)[1])) {
            $this->hasLocalData = true;
        }
    }

    protected function getValue($elementId, $clean = true)
    {
        $content = $this->getTable(self::LOCAL_TABLE, $this->localContent);
        @$this->dom->loadHTML($content);
        if ($clean) {
            return $this->clean($this->dom->getElementById($elementId)->textContent);
        }
        return $this->dom->getElementById($elementId)->textContent;
    }

    protected function covidDataLocal()
    {
        $updated = $this->getValue('covid-updated-date', false) . ', ' . $this->getValue('covid-updated-time', false);
        $final['tested'] = [
            'updatedFormated' => $updated,
            'latest' => $this->getValue('covid-test-today'),
            'new' => $this->getValue('covid-test-new'),
        ];
         $final['testedAG'] = [
            'updatedFormated' => $updated,
            'latest' => $this->getValue('covid-testAG-today'),
            'new' => $this->getValue('covid-testAG-new'),
         ];
         $final['infected'] = [
            'updatedFormated' => $updated,
            'latest' => $this->getValue('covid-infected-today'),
            'new' => $this->getValue('covid-infected-new'),
         ];
         $final['inficatedAG'] = [
            'updatedFormated' => $updated,
            'latest' => $this->getValue('covid-inficatedAG-today'),
            'new' => $this->getValue('covid-inficatedAG-new'),
         ];
         $final['died'] = [
            'updatedFormated' => $updated,
            'latest' => $this->getValue('covid-died-today'),
            'new' => $this->getValue('covid-died-new'),
         ];
         $final['hospital'] = [
            'updatedFormated' => $updated,
            'latest' => $this->getValue('covid-hospital-today', false),
            'new' => $this->getValue('covid-hospital-new', false),
         ];
         $final['injected'] = [
            'updatedFormated' => $updated,
            'latest' => $this->getValue('covid-injected-today'),
            'new' => $this->getValue('covid-injected-new'),
         ];
         $final['injectedFirst'] = [
            'updatedFormated' => $updated,
            'latest' => $this->getValue('covid-injectedFirst-today'),
            'new' => $this->getValue('covid-injectedFirst-new'),
         ];
         $final['injectedSecond'] = [
            'updatedFormated' => $updated,
            'latest' => $this->getValue('covid-injectedSecond-today'),
            'new' => $this->getValue('covid-injectedSecond-new'),
         ];
         return $final;
    }

    protected function getActualData()
    {

        $json = $this->dataToJson($this->covidDataLocal());
        if ($this->hasLocalData) {
            file_put_contents(self::STATIC_FILE, $json);
            return $json;
        }
    }

    public function run()
    {
        $this->init();
        print $this->getActualData();
    }
}
