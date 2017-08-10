<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 09.08.2017
 * Time: 15:38
 */
include_once 'functions.php';

if(isset($_GET['submit'])){
    echo 'Get<br>';
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

if(isset($_POST['submit'])){
   echo 'Post<br>';
    print_r($_POST);
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

if(isset($_POST['chek']))
{

        print_r($_POST['chek']);
}
if(isset($_POST['radio']))
{

        print_r($_POST['radio']);
}
if(isset($_POST['list']))
{

        print_r($_POST['list']);
}
if(isset($_POST['subFail']))
{
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';
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

        <form action="forms.php" method="post">
            A:<input type="text" name="a"><br>
            B:<input type="text" name="b"><br>
            C:<input type="text" name="c"><br>
            <input type="submit" value="otpravka" name="submit">
            <input type="reset" value="ochistka">
            <hr/>
            Porrol: <input type="password" name="ps">
        </form>
        <hr/>
        <form action="forms.php" method="post">
            dog  <input type="checkbox" name="chek[]" value="dog">
            cat  <input type="checkbox" name="chek[]" value="cat">
            maus <input type="checkbox" name="chek[]" value="maus">
            <input type="submit" value="otpravit">
        </form>
        <hr/>
        <form action="forms.php" method="post">
            dog  <input type="radio" name="radio" value="dog">
            cat  <input type="radio" name="radio" value="cat">
            maus <input type="radio" name="radio" value="maus">
            <input type="submit" value="otpravit">
        </form>
        <hr/>
        <form action="forms.php" method="post">
            <select name="list">
                <option value="1">cat</option>
                <option value="2">dog</option>
                <option value="3">maus</option>
            </select>
            <input type="submit" value="otpr">
        </form>
        <hr/>
        загрузка файла
        <form action="forms.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" value="otpr" name="subFail">
        </form>

    </div>
</body>
</html>
