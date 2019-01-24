<?php

class ParentClass
{

    public $public = 'ParentClass::public';

    protected $protected = 'ParentClass::protected';

    private $private = 'ParentClass::private';

    public function getProtected()
    {
        return $this->protected;
    }

    public function getPrivate()
    {
        return $this->private;
    }

}

class Child extends ParentClass
{

    public function tryAccessingProperties()
    {
        echo $this->public . PHP_EOL;
        echo $this->protected . PHP_EOL;
        echo $this->getProtected() . PHP_EOL;
        echo $this->getPrivate() . PHP_EOL;
        echo $this->private . PHP_EOL;
    }

}

$child = new Child();
$child->tryAccessingProperties();

$parentClass = new ParentClass();
echo $parentClass->public . PHP_EOL;
echo $parentClass->protected . PHP_EOL;