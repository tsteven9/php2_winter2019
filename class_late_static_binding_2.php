<?php

abstract class Base
{

	public static $instance;

}

class Subclass1 extends Base
{

	public static function getInstance()
    {
        self::$instance = new self();
        return self::$instance;
	}

}

class Subclass2 extends Base
{

    public static function getInstance()
    {
        self::$instance = new self();
        return self::$instance;
    }

}

// Refers to the static instance
$obj1 = Subclass1::getInstance();
$obj2 = Subclass2::getInstance();

var_dump($obj1, $obj2);