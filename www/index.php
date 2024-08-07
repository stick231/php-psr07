<?php

use Framework\Http\RequestFactory;
use Framework\Http\Response;

$filePath = __DIR__ . '/../vendor/autoload.php';

require $filePath;


$requestFabric = (new RequestFactory())::fromGlobals();

$name = ($requestFabric->getQueryParams()['name'] ?? 'quest');


$response = (new Response("Hello, $name " . '!'))->withHeader("X-Developer", "ElisDN");

header("HTTP/1.0" . $response->getStatuscode() . "" .  $response->getReasonPhrase());
foreach($response->getHeaders() as $name => $value){
    header($name . ':' . $value);
}

echo $response->getBody() . PHP_EOL;