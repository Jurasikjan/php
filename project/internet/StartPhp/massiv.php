<?php

$arr=['first' => 1,'second' => 2,'third' => 3];

print_r($arr);
echo '<br/>';
var_dump(in_array(3,$arr));
echo '<br/> var_dump(in_array(3,$arr)); поиск символа в массиве<hr/>';

$values=array_values($arr);

echo '<pre>';
print_r($values);
echo '</pre>';

echo '$values=array_values($arr);  получаем значения из массива <hr/>';

$values=array_keys($arr);

echo '<pre>';
print_r($values);
echo '</pre>';

echo '$values=array_values($arr);  получаем ключи из массива <hr/>';

$group1=['4125' => 'Ваня', '2663' => 'Алексей', '2216' => 'Вова'];
$group2=['1532' => 'Олег', '3352' => 'Василий', '1123' => 'Сергей'];

$commonGr=$group1+$group2;
echo '<pre>';
print_r($commonGr);
echo '$commonGr=$group1+$group2; объединяем группы в один массив</pre><hr/>';

$arr1=[1,2,3,4,5];
$arr2=[4,5,6,7,8];

echo '$arr1=[1,2,3,4,5];
$arr2=[4,5,6,7,8]; <pre>';
print_r(array_intersect($arr1,$arr2));
echo 'print_r(array_intersect($arr1,$arr2)); создает массив с одинаковыми значениями</pre>';

echo ' <pre>';
print_r(array_diff($arr1,$arr2));
echo 'print_r(array_diff($arr1,$arr2)); создает массив вычисляя расхождения</pre><hr/>';

$arr3=[21,12,44,4,5];
$arr4=['3' => 'Oleg','2' => 'Vasy','1' => 'Serg'];

echo '$arr3=[21,12,44,4,5]; sort($arr3); <br/>';
sort($arr3);
print_r($arr3);
echo 'сортирум массив <hr/>';

echo '$arr4=[\'3\' => \'Oleg\',\'2\' => \'Vasy\',\'1\' => \'Serg\']; ksort($arr3); <br/>';
ksort($arr4);
print_r($arr4);
echo 'сортирум массив по ключу<hr/>';

