<?php

/* From the PHP Manual (http://php.net/manual/en/language.oop5.traits.php):

As of PHP 5.4.0, PHP implements a method of code reuse called Traits.

Traits are a mechanism for code reuse in single inheritance languages such as PHP.

A Trait is intended to reduce some limitations of single inheritance by enabling a developer
to reuse sets of methods freely in several independent classes living in different class
hierarchies. The semantics of the combination of Traits and classes is defined in a way
which reduces complexity, and avoids the typical problems associated with multiple inheritance
and Mixins.

A Trait is similar to a class, but only intended to group functionality in a fine-grained
and consistent way. It is not possible to instantiate a Trait on its own. It is an addition
to traditional inheritance and enables horizontal composition of behavior; that is, the application
of class members without requiring inheritance.

An inherited member from a base class is overridden by a member inserted by a Trait.
The precedence order is that members from the current class override Trait methods,
which in turn override inherited methods.*/

abstract class Animal
{

    //General code applicable to all sub classes
    public $hasReason;
    
    abstract public function get($prop = null);

}

trait BeastTrait
{

    public $laysEggs;
    
    public function getLaysEggs()
    {
        return $this->laysEggs ?: null;
    }

    public function get($prop = null)
    {
        return $this->$prop . 'beast trait' ?: null;
    }
    
}

trait HumanTrait
{

    public $humor = true;
    
    public function getHumor()
    {
        return $this->humor ?: null;
    }

    public function get($prop = null)
    {
        echo 'From trait';
    }

}

class Human extends Animal
{

    use HumanTrait;
    //code specific to a human

    public $hasReason = true;

    /*public function get($prop = null)
    {
        return $this->$prop . 'human' ?: null;
    }*/

}

class Chicken extends Animal
{

    use BeastTrait;
    //code specific to a chicken

    public $hasReason = false;

}

class Horse extends Animal
{

    use BeastTrait;
    //code specific to a horse

    public $hasReason = false;

    public function get($prop = null)
    {
        return $this->$prop . 'horse' ?: null;
    }

}

$human = new Human();
$chicken = new Chicken();
$horse = new Horse();

echo $human->get('hasReason') . PHP_EOL;
echo $chicken->get('hasReason') . PHP_EOL;
echo $horse->get('hasReason') . PHP_EOL;

var_dump($human);