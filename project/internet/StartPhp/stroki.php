<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 08.08.2017
 * Time: 16:23
 */

$city="London";
$percent = 22/41*100;
$total=1000;

$format="По  статистике %.2f из %d опрошенных в городе %s";
$format1='По %3$s статистике %2$.2f из %1$d опрошенных в городе %3$s';
//%-куда 3$ порядковый номер s строка f число с запятой .2 до второго числа d число
printf($format,$percent,$total,$city); //подстановка в строку и печать
echo "<br>";
printf($format1,$percent,$total,$city);
echo "<br>";
$rez= sprintf($format,$percent,$total,$city);// возвращает результат
echo "<br>";
