<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 09.08.2017
 * Time: 9:41
 */
$arr=[1,2,2,3,4,5,6];
$arr2=array_reverse($arr);
print_r($arr2);
echo 'var_dump() — Выводит информацию о переменной';
echo "<br>";
var_dump(isset($arr2)); // существует ли переменная
echo "<br>";
var_dump(empty($arr2));// храниться ли в переменной что то
echo "<br>";
echo gettype($arr2);//тип переменной
echo "<br>";
var_dump(is_array($arr2));//проверка переменной на тип
echo " is_array<br>";
var_dump( is_string($arr2));//проверка переменной на тип
echo "  is_string<br>";

echo "<pre>";
print_r(get_defined_vars());//все переменные на странице
echo "</pre>";

echo '<h1>Языковые конструкции</h1>';

echo 'die & exit - после строки в php die; прекращаеться выполнения кода в exit(\'stroka\') можно вставить строку <hr/>';

//die;
//echo 'rrrrrr';

$a=3;
$b=5;

$str='$c=$a+$b;';
echo 'eval() выполнения кода php через строку $str=\'$c=$a+$b\';';
eval($str);
echo $c.'<hr/>';

$arry = ['znach1','znach2'];

list($var1,$var2) = $arry;
echo '$arry = [\'znach1\',\'znach2\'];
list($var1,$var2) = $arry;  значения массива перемещаем в переменные<br/>'.$var1.'<br/>'.$var2;
