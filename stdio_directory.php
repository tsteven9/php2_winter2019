<?php

$path = dirname('.');

if ($handle = opendir($path)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && !is_dir($entry)) {
            $fileSize = filesize($path  . DIRECTORY_SEPARATOR .  $entry);
            $myArray = file($path . DIRECTORY_SEPARATOR . $entry);
            $numberOfLines = count($myArray);
            echo PHP_EOL;
            echo "File : $entry,";
            echo PHP_EOL;
            echo "File size : $fileSize,";
            echo PHP_EOL;
            echo "Number of lines : $numberOfLines.";
            echo PHP_EOL;
        }
    }
    closedir($handle);
}