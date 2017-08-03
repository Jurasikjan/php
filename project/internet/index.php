<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<br>
<h1>Hello !</h1>
<?php
$dat=date("d.m.y");
echo $dat;
echo "<br>";
for ($i =1; $i<=5; $i++)
{
    echo $i;
}
echo "<br>";
if(isset($dat))
{
    echo "isset -проверка существует ли переменная $dat";
}
echo "<br>";
unset($dat);//удаляем переменную
echo "unset() удаляет переменную $dat";
echo "<br>";
define("pi",3.14); //константа
echo "define(\"pi\",3.14); //константа ";echo pi;
echo "<br>";
$a=array('a'=>'apple','b'=>'car','c'=>'bay');
print_r($a);
echo "<br>";
echo "$a=array('a'=>'apple','b'=>'car','c'=>'bay'); массив<br>
print_r($a); вывод массива";
echo "<br>";

?>
<br>
<a href="stroki.php">Stroki</a>
<a href="cikl.php">cikl</a>
<a href="massiv.php">massiv</a>
</body>
</html>