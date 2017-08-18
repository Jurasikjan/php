<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 16.08.2017
 * Time: 9:53
 */
class Car{
    public $color="white";
    public $speed;
    public $fuel;

    public static $eng=1;
    const WHEELS =4;

    public static function fnStatic(){
        echo '<br>function fnStatic() '.Car::$eng;
    }

    public function __construct($color=null,$speed=null,$fuel=null)
    {
        echo '<br>new object of '.__CLASS__;
        echo '<br>method of '.__METHOD__;

        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->color = $color;
        echo '<br> self::WHEELS;// доступ к классу'.self::WHEELS;// ТЕКУЩИЙ класс
        echo '<br>'.Car::WHEELS;
        echo '<br>'.self::$eng;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo '<br>__destruct object of '.__CLASS__;


    }


    public function test(){
        echo '<br>test function';

        echo "<pre>";
        print_r($this);
        echo "</pre>";

    }
    public function tripTime($distantion){
        echo '<br>tripTime function '.get_class()."<br>";
        return $distantion / $this->speed;
    }

}

$car = new Car('wiht',100,10);

echo '<br>Car::WHEELS '.Car::WHEELS;
$car1 = new Car('black',60,15);

$car2 = new Car();

$car2->test();


$car1->test();

echo $car1->tripTime(100);
echo $car->tripTime(100);

unset($car1);// удаляет класс и вызывается диструктор

Car::fnStatic();