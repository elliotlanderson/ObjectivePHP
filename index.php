<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require 'vendor/autoload.php';
$whoops = new \Whoops\Run;

$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);

$whoops->register();

include('src/String/String.php');

include('src/Collection/Collection.php');

$test = new ObjectivePHP\String\String('ABCCBA');


$array = $test->explode('C');

$array->add(array(
	'test'=>4
));

$array[0] = 'test';

