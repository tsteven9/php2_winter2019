<?php

// Class Subspecies may not inherit from final class (Species).

final class Species
{
    public function term()
    {
        return __CLASS__ . __METHOD__;
    }
}

// WRONG!!!
class Subspecies extends Species
{
    public function term2()
    {
        return __CLASS__ . __METHOD__;
    }
}

$object = new Subspecies();
echo $object->term();