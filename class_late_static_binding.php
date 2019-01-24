<?php

// Reference is resolved at runtime

class ParentClass
{

	public static function getClassName()
    {
		echo __CLASS__ . PHP_EOL;
	}

	public static function getClass()
    {
	    //self:: refers to the current class
		//static:: resolves to the class name late at runtime
		self::getClassName();
		static::getClassName();
	}

}

class Child extends ParentClass
{

	public static function getClassName()
    {
		echo __CLASS__ . PHP_EOL;
	}

}

Child::getClass();