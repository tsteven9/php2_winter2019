<?php

$fileName = dirname('.') . DIRECTORY_SEPARATOR . 'test.txt';

$myName = "This is a message." . PHP_EOL;

if (is_writable($fileName)) {

    if (!$handle = fopen($fileName, 'a+')) {
        echo "Cannot open file ($fileName)" . PHP_EOL;
        exit;
    }

    if (fwrite($handle, $myName) === FALSE) {
        echo "Cannot write to file ($fileName)" . PHP_EOL;
        exit;
    }

    echo "Success, wrote ($myName) to file ($fileName)" . PHP_EOL;

    fclose($handle);

} else {

    echo "The file $filename is not writable" . PHP_EOL;

}
