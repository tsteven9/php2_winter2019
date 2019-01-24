<?php

// References and Objects
// http://www.php.net/manual/en/language.oop5.references.php

class A
{

    public $foo = 1;

}

$a = new A;
$b = $a;     // $a and $b are different identifiers; same instance of the same object
// ($a) = ($b) = <id>
$b->foo = 2;
echo $a->foo . PHP_EOL;


$c = new A;
$d = &$c;    // $c and $d are references; not necessary in PHP 5
// ($c,$d) = <id>

$d->foo = 2;
echo $c->foo . PHP_EOL;


$e = new A;

function foo($obj)
{
    // ($obj) = ($e) = <id>
    $obj->foo = 2;
}

foo($e);
echo $e->foo . PHP_EOL;

// Cloning objects, and comparing them
$user1 = new A(9);
$user2 = clone $user1;

echo 'The user objects are' . ($user1 == $user2 ? '' : ' not') . " equivalent.<br />";
echo 'The user objects are' . ($user1 === $user2 ? '' : ' not') . " identical.<br />";

//echo var_dump($user1->clone, $user2->clone);