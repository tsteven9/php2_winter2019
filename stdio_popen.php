<?php

$cmd = 'php test.php';

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $handle = popen('start /B '. $cmd, 'r');
} else {
    $handle = popen($cmd, "r");
}

echo "'$handle'; " . gettype($handle) . PHP_EOL;

$read = fread($handle, 2096);

echo $read . PHP_EOL;

pclose($handle);