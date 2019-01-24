<?php

class MyParentClass
{

    protected $firstProperty;

    protected $secondProperty;

    public function __construct($integer = 0, $string = 'Nothing')
    {
        $this->firstProperty = (int) $integer;
        $this->secondProperty = (string) $string;
    }

    protected function getSecondPropertyWithText($string = 'parent')
    {
        $string = (string) $string;
        $output = "The $string says: \"my first property is the integer {$this->firstProperty} and my second is the string {$this->secondProperty}.\"" . PHP_EOL;
        return $output;
    }

    public function setSecondProperty($secondProperty)
    {
        $this->secondProperty = (string) $secondProperty;
        return $this;
    }

}

class MyChildClass extends MyParentClass
{

    public function getSecondPropertyWithText($string = 'child')
    {
        $string = (string) $string;
        $output = parent::getSecondPropertyWithText($string);
        return $output;
    }

}

// Create object instance of child class - TESTING type casting on the first property (string to int)
$childObject = new MyChildClass('50');

// Set and get the second property - TESTING type casting on this property (int to string)
echo $childObject->setSecondProperty(123)->getSecondPropertyWithText();

// Modify and get the second property again
echo $childObject->setSecondProperty('TEST')->getSecondPropertyWithText();

var_dump($childObject);