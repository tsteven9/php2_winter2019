<?php

$fileName = dirname('.') . DIRECTORY_SEPARATOR . 'lipsum.txt';

$data = file_get_contents($fileName); //read the file

echo $data;