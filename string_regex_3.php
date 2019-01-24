<?php

$foo = 'There are 3333 persons.';

echo preg_match('/[0-9]{,3}/', $foo, $match);

var_dump($match);