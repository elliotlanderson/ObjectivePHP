<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require 'vendor/autoload.php';

/* Just calling the nice error handler for debugging */
$whoops = new \Whoops\Run;

$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);

$whoops->register();

/* -- End Error Handler -- */

/* -- It's too late at night to figure out composer */

include('src/String/String.php');

include('src/Collection/Collection.php');

/* -- End Laziness -- */

# Create our first String object!
$test = new ObjectivePHP\String\String('ABCCBA');

# Create our first Array Object!
$array = new ObjectivePHP\Collection\Collection();

$test[1] = 'Z';

// dumping the object returns $this, so we can continue to call upon it if we so choose

$test->upper()->lower()->html()->replace('c', 'A4')->append('php doesn\'t suck I swear')->dump()->clear();


echo $array->length.'<br />';

$array->add(array(
	'test'=>5,
	'another_test'=> 7
));

// Echoing an array will json_encode it and print it out!
echo $array.'<br />';

echo $array->first.'<br />';

echo $array->last;

$array->reverse();

echo '<br />'.$array;

// empty out the array

$array->clear();
