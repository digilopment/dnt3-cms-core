<?php

namespace DntLibrary\App;

use UI\Exception\RuntimeException;

class Curl
{

    private $url;
    private $options;

    public function __construct($url = false, array $options = [])
    {
        $this->url = $url;
        $this->options = $options;
    }

    public function post(array $post, $url = false)
    {

        if ($url) {
            $this->url = $url;
        }
        $ch = curl_init($this->url);

        foreach ($this->options as $key => $val) {
            curl_setopt($ch, $key, $val);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        $errno = curl_errno($ch);

        if (is_resource($ch)) {
            curl_close($ch);
        }

        if (0 !== $errno) {
            throw new RuntimeException($error, $errno);
        }

        return $response;
    }

}
