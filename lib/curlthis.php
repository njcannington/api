<?php
namespace Lib;

class CurlThis
{
    private $auth;
    private $curl;

    public function __construct($api_key)
    {
        $this->auth = "Authorization: Basic ".$api_key;
        $this->initCurl();
    }

    private function initCurl()
    {
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, [$this->auth]);
    }

    private function resetCurl()
    {
        curl_reset($this->curl);
        $this->initCurl();
        $this->params = null;
    }

    public function getThis($url)
    {
        curl_setopt($this->curl, CURLOPT_URL, $url);
        echo $url;
        $results = curl_exec($this->curl);
        $this->resetCurl();

        return $results;
    }
}
