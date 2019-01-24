<?php

class Car
{

    const TYPE = 'Compact';

    public $specialFeature = true;

    protected $color;

    protected $model;

    public function __construct($value1, $value2)
    {
        $this->$value1 = $value2;
    }

    //destructors are used for cleanup
    public function __destruct()
    {
        echo 'Cleaning up ' . $this->model . PHP_EOL;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string
     *
     * @return Car
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    //Getter
    public function getColor()
    {
        $color = 'This car is ' . $this->color .'!';
        return $color;
    }

    //Setter
    public function setColor($param)
    {
        $this->color = $param;
        return $this;
    }

}

$car1 = new Car('test1', 'test2');
$car2 = new Car('test3', 'test4');

echo $car1::TYPE . PHP_EOL;

$car1->setColor('red')->setModel('Cruze');
$car2->setColor('blue')->setModel('Soul');

unset($car1);

echo $car2->getColor() . PHP_EOL;

//Static Class
class Currency
{

    public static $currency = '$';
    public static function addCurrencySymbol($currency)
    {
        return self::$currency . $currency;
    }

}

echo Currency::addCurrencySymbol('€') . PHP_EOL;