<?php

// Abstract classes
// http://www.php.net/manual/en/language.oop5.abstract.php
// When inheriting from an abstract class, all methods marked abstract in the parent's class
// declaration must be defined by the child; additionally, these methods must be defined
// with the same (or a less restricted) visibility. For example, if the abstract method is
// defined as protected, the function implementation must be defined as either protected
// or public, but not private.

abstract class AbstractClass
{

    // Force Extending class to define these methods
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // Common method
    abstract public function printOut();

}

class ConcreteClass1 extends AbstractClass
{

    protected function getValue()
    {
        return 'ConcreteClass1' . PHP_EOL;
    }

    public function prefixValue($prefix)
    {
        return "{$prefix}ConcreteClass1" . PHP_EOL;
    }

    public function printOut()
    {
        print $this->getValue() . __CLASS__ . PHP_EOL;
    }

}

class ConcreteClass2 extends AbstractClass
{

    public function getValue() {
        return 'ConcreteClass2' . PHP_EOL;
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass2";
    }

    public function printOut() {
        print $this->getValue() . __CLASS__ . PHP_EOL;
    }

}

$class1 = new ConcreteClass1;
$class1->printOut();
echo $class1->prefixValue('FOO_') ."<br />";

$class2 = new ConcreteClass2;
$class2->printOut();
echo $class2->prefixValue('FOO_') ."<br />";