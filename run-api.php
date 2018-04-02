<?php
require "autoload.php";

use App\API;

echo "please provide the api key:\n";

$api_key = trim(fgets(STDIN));

$api = new API($api_key);
print_r($api->getAccount());
