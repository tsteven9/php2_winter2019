<?php

abstract class BaseClass
{

    abstract public function importantFunction(BaseClass $object);

}

class ConcreteClass extends BaseClass
{

    public function importantFunction(BaseClass $object)
    {
        if ($object instanceof ConcreteClass) {
            echo 'Polymorphism rocks!' . PHP_EOL;
        } else {
            echo 'Something went wrong!!!' . PHP_EOL;
        }
    }

}

$concreteClass1 = new ConcreteClass();
$concreteClass2 = new ConcreteClass();

$concreteClass1->importantFunction($concreteClass2);