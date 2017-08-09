<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 09.08.2017
 * Time: 15:38
 */
include_once 'functions.php';

if(isset($_GET['submit'])){
    print_r($_GET);
    $a=$_GET['a'];
    $b=$_GET['b'];
    $c=$_GET['c'];
    if(!empty($a) && !empty($b) && !empty($c))
    {
        $rez=quadratic($a,$b,$c);
        if($rez)
        {
           print_r($rez);
        }else{
            echo 'NETY';
        }

    }else{
        echo 'zapolnite formy';
    }


}

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
    <div>
        <form action="forms.php" method="get">
            A:<input type="text" name="a"><br>
            B:<input type="text" name="b"><br>
            C:<input type="text" name="c"><br>
            <input type="submit" value="otpravka" name="submit">
        </form>

    </div>
</body>
</html>
