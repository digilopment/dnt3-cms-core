<?php

namespace App;

use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;

class AggrBuilder
{
    public $decode;

    public function __construct()
    {
        $this->rest = new Rest();
        $this->dnt = new Dnt();
    }

    protected function parse()
    {
        $params = explode(';', $this->decode);
        $response = [];
        foreach ($params as $param) {
            $paramData = explode(':', $param);
            $response[$paramData[0]] = isset($paramData[1]) ? $paramData[1] : false;
        }
        return (object) $response;
    }

    public function decode()
    {
        $builder = $this->rest->get('aggrBuilder');
        if ($builder) {
            $this->decode = $this->dnt->hexToStr($builder);
            return $this->parse();
        }
        return false;
    }

    public function encode($params)
    {
        $finalParams = [];
        foreach ($params as $key => $param) {
            $finalParams[] = $key . ':' . $param;
        }
        return $this->dnt->strToHex(join(';', $finalParams));
    }

    public function build($aggr)
    {
        $final = [];
        $url = WWW_FULL_PATH;
        $parsed = parse_url($url);
        if (isset($parsed['query'])) {
            parse_str($parsed['query'], $queryParams);
            foreach ($queryParams as $key => $param) {
                $final[$key] = $param;
            }
            $final['aggrBuilder'] = $aggr;
        } else {
            $final['aggrBuilder'] = $aggr;
        }

        $return = explode('?', $url)[0] . '?' . http_build_query($final);

        return $return;
    }
}
