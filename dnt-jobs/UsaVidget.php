<?php

namespace DntJobs;

use DntLibrary\Base\Dnt;
use DOMDocument;

class UsaVidgetJob
{

    const LOCAL_SERVICE_URL = 'https://www.markiza.sk/clanok/2011562?data=1';
    const LOCAL_TABLE = 'usa-vidget';
    const STATIC_FILE = 'data/usa-vidget.json';

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
        $temp = explode(self::LOCAL_TABLE, $this->localContent);
        if (isset($temp[1])) {
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
        $final['biden'] = array(
            'votes' => $this->getValue('biden-votes', false),
        );
        $final['trump'] = array(
            'votes' => $this->getValue('trump-votes', false),
        );
        $final['updated'] = array(
            'updatedFormated' => $this->getValue('updated', false),
        );
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
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        print $this->getActualData();
    }
}
