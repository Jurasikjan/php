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
<?php
$a=0;
while ($a<=30)
{
    echo $a." ";
   $a++;
}
echo "<br/> do{
    echo \$x;
}while(\$x++<10) - ";
$x=1;
do{
    echo $x;
}while($x++<10);

echo "<br/> for(\$g =0;\$g++<10;)
{
    echo \$g;
}";

for($g =0;$g++<10;)
{
    echo $g;
}
echo "<br> перебор масива по ключу и значению foreach (\$_SERVER as \$k => \$v)
    echo \"< b >$k< /b > => < b >\$v< /b > < br >\";";

foreach ($_SERVER as $k => $v)
    echo "<b>$k</b> => <b>$v</b> <br>";
?>
</body>
</html>