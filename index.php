<?php

require 'vendor/autoload.php';
$whoops = new \Whoops\Run;

$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);

$whoops->register();

include('src/String/String.php');

$test = new ObjectivePHP\String\String('Test');

echo $test->lower()->append(' Lol')->upper()->replace('T', 'm');
