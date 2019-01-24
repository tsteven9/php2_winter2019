<?php

$subject = 'This is a string.';

// Something strange!!! "T" is at position 0! 0 === false!!!
if (strpos($subject, 'T') !== false) {
    echo 'Found the letter "T"!' . PHP_EOL;
} else {
    echo '"T" not found!' . PHP_EOL;
}

$array = explode(' ', $subject);

$result = in_array('This', $array);

var_dump($result);