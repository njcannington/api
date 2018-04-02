<?php
namespace App;

use Lib;

class API
{
    private $api_key;
    private $root;
    private $curl;

    public function __construct($api_key)
    {
        $this->api_key = $api_key;
        $dc = $this->getDC();
        $this->root = "https://{$dc}.api.mailchimp.com/3.0/";
        $this->curl = new Lib\CurlThis($this->api_key);
    }

    private function getDC()
    {
        $api_pieces = explode("-", $this->api_key);

        return $api_pieces[1];
    }

    public function getAccount()
    {
        return $this->curl->getThis($this->root);
    }
}
