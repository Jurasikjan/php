<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 10.08.2017
 * Time: 9:49
 */
if(!empty($_COOKIE['name'])){
    $name=$_COOKIE['name'];
}else{
    $name='GOST';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document2</title>
</head>
<body>
<h1>Stranica 2</h1>
<h2>HELLO : <?php echo $name?></h2>
<a href="cooci.php">coociAndSession</a>
</body>
</html>
