<?php

$fileName = dirname('.') . DIRECTORY_SEPARATOR . 'lipsum.txt';

$myArray = file($fileName);

var_dump($myArray);

foreach ($myArray as $line) {

    echo "$line[0]" . PHP_EOL;

}
