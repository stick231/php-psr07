<?php

use Framework\Http\Request;

$filePath = __DIR__ . '/vendor/autoload.php';

require $filePath;


$request = new Request;

phpinfo();