<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 09.08.2017
 * Time: 10:25
 */

$nov=getdate();

echo '$nov=getdate(); <pre>';
print_r($nov);
echo '</pre><hr/>';

$timestamp=time(); // количество секунд с 1 января 1970 года
echo $timestamp.' $timestamp=time(); количество секунд с 1 января 1970 года<hr/>';

$hour=1;
$min=22;
$sec=33;
$month=2;
$day=2;
$year=1969;
$t=mktime($hour,$min,$sec,$month,$day,$year); // сколько прошло секунд до определенной даты

echo ' $t=mktime($hour,$min,$sec,$month,$day,$year); сколько прошло секунд до определенной даты  '.$t.'<br/>';
echo 'date(\'d.m.Y h:i:s\',$t) перевод из секунд в дату '.date('d.m.Y H:i:s',$t).'<hr/>';