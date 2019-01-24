<?php

// Method Precedence
// A trait method, when  inserted in a derived class overrides a same named method in the base class.

class Base
{

    public function sayHello()
    {
        echo 'Hello ';
    }

}

trait SayWorld
{

    public function sayHello()
    {
        parent::sayHello();
        echo 'World!';
    }

}

class MyHelloWorld extends Base
{

    use SayWorld;

}

$o = new MyHelloWorld();
$o->sayHello();