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
 $a="\\n перевод строки \n (перевод строки в браузере < br >) <br>\\r символ возврата коретки \n  <br>\\t символ табуляции \n  \\$ символ долора";
 echo "$a<br>";
 $b="hell"." price \"hell\".\" price\" сложения строк";
 echo $b."<br>";
 echo $b[1]." перечисления масива \$b[1] <br>";

 echo "условный оператор <br>";
 echo " \$x=-17;
 \$x = \$x < 0 ? -\$x : \$x;  результат выражения записываем в х = если х<0 ? тогда меняем знак : если нет тогда х <br>";
 $x=-17;
 $x = $x < 0 ? -$x : $x;
echo $x;

?>
</body>
</html>