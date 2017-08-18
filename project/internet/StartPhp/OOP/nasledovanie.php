<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 17.08.2017
 * Time: 9:35
ПЛАН
https://php-start.com/lesson/php-start-theory/object-oriented-programming-part-2
 *
1. Наследование.

2. Переопределение свойств и методов.

3. Parent::

4. Финальные методы и классы.

5. Инкапсуляция.

6. Модификаторы доступа.
 */

class Vehicle {
    public $color;
    public $speed;
    public $brand;
    public function tripTime($distance){
        return $distance / $this->speed;
    }
}

class Bicycle extends Vehicle {
    public $type;
}

class Car extends Vehicle {
    public $fuel;
    public function fuelCons ($distancce){
        return ($this->fuel * $distancce) /100;
    }
}



$car1=new Car();
$car1->speed=110;
$car1->fuel=14;

$car2=new Car();
$car2->speed=110;
$car2->fuel=14;

$bicycl=new Bicycle();
$bicycl->speed=20;

$distancce=100;

echo '<br>'
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
