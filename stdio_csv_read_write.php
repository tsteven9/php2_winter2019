<?php

$course = array('Test 101', 'Optional', 'Prof. Andrew');

$file = dirname('.') . DIRECTORY_SEPARATOR . 'mycsvfile.txt';

// Open the file to get existing content
$current = file_get_contents($file);

// Append a new person to the file
$current .= "{$course[0]}, {$course[1]}, {$course[2]}" . PHP_EOL;

// Write the contents back to the file
file_put_contents($file, $current);