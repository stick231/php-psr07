<?php

use Framework\Http\RequestFactory;

$filePath = __DIR__ . '/../vendor/autoload.php';

require $filePath;


$request = RequestFactory::fromGlobals();

$name = ($request->getQueryParams()['name'] ?? 'quest');

$response = (new Response("Hello, $name " . '!'))->withHeaders();