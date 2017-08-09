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

$str ='some string';

echo $str.' - '.strlen($str).'<hr/>'; //длина строки

echo 'substr($str,5,6) - ';
echo substr($str,5,6).'<hr/><br/>';//получаем часть строки

echo str_replace('s',' ',$str).'<hr/>';//замена символов s на пробел
echo str_replace('some','!',$str).'<hr/>';//замена слова s на пробел
echo str_replace(array('s','n'),'!',$str).'<hr/>';//массив символов
echo str_replace(array('s','n'),array('1','2'),$str).'<hr/>';//массив символов на масив символов

$str1='Разделитель. строк на. массив';
$rez=explode('.',$str1); //разбивает строку на масив по символу
echo '$str1=\'Разделитель. строк на. массив\'; $rez=explode(\'.\',$str1); <pre>';
print_r($rez);
echo '</pre><hr/>';

echo implode('!',$rez).'<br/>';//склкеиваем масиив в строку символом !
echo implode('',$rez).'<hr/>';