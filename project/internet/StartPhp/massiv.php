<?php
$arr=[1,2,2,3,4,5,6];
$arr2=array_reverse($arr);
print_r($arr2);
echo "<br>";
var_dump(isset($arr2)); // существует ли переменная
echo "<br>";
var_dump(empty($arr2));// храниться ли в переменной что то
echo "<br>";
echo gettype($arr2);//тип переменной
echo "<br>";
var_dump(is_array($arr2));
echo " is_array<br>";
var_dump( is_string($arr2));//проверка переменной на тип
echo "  is_string<br>";

echo "<pre>";
print_r(get_defined_vars());
echo "</pre>";

