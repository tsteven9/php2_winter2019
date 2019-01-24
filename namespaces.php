<?php

namespace Local;

class A
{
    public $property = 1;
}

$a = new A;

echo $a->property . PHP_EOL;

var_dump($a);

// No A class in global namespace
$b = new \A();