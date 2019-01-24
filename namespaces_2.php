<?php

namespace Local {

    class SomeClass
    {
        public $property = 1;
    }

    $a = new SomeClass;

    echo $a->property . PHP_EOL;

    var_dump($a);

}

namespace OtherLocal {

    use Local\SomeClass;

    $b = new SomeClass;

    $b->property = 2;

    var_dump($b);
}
