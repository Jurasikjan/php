<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 09.08.2017
 * Time: 12:00
 */

include_once 'functions.php'; //подключаем файл

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
        <?php echo doSomat(5)?>
        <?php echo doSomat(12)?>
        <?php echo doSomat(2)?>
        <?php echo doSomat(20)?>
    </div>
</body>
</html>
