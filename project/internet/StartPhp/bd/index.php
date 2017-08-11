<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 11.08.2017
 * Time: 13:50
 */
include_once 'conect.php';
//https://php-start.com/lesson/php-start-theory/databases-part-2

    //INSERT INTO `news_category` (`name`, `descroption`) VALUES ('film33', 'fffffffffffddddddddd'),('film44', 'fffffffffffddddddddd'),
// вставляем 2 строки с разными значениями

//задача удалить все новости опубликованые раньше 5-ти дней назад.
    //DELETE FROM news WHERE date <DATE_SUB(CURDATE(),INTERVAL 5 DAY);
//CURDATE()-дата сейчас
//INTERVAL 5 DAY - интервал 5 дней /INTERVAL 1 HOUR - интервал 1 час
//DATE_SUB(a,b)- вычисляет из даты а интервал b

//ORDDER BY - сортировка
//DESC - убывание
//ASC - Возврвстания

//LIMIT - количество записей над которыми проводятся действия

//Задача удалить три последнии новости
//DELETE FROM news ORDER BY date DESC LIMIT 3;

    // UPDATE news SET status='0'; обновляем таблицу news там status=0 ВЕЗДЕ
    // UPDATE news SET status='0' WHERE id=1; обновляем таблицу news там status=0 где id=1

// mysqli_affected_rows($con) - возвращает количество обработаных строк
$con = conectToMysql();
if(isset($_POST['otpravit']))
{

//   $ins= "INSERT INTO `news_category` (`name`, `descroption`,sort_order,status) VALUES ('".$_POST['name']."', '".$_POST['descroption']."')";
   $ins= "INSERT INTO `news_category` (`name`, `descroption`,sort_order,status) VALUES ('%s','%s','%d','%d')";
   $ins=sprintf($ins,$_POST['name'],$_POST['descroption'],$_POST['sort_order'],$_POST['status']);
   $info=mysqli_query($con,$ins);
}
$select_news_category="SELECT * FROM `news_category`";
$otvet=mysqli_query($con,$select_news_category);
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
        <form action="index.php" method="post">
            <p>Vstavlyem danie v tablicy news_category</p>
            name <input type="text" name="name">
            descroption <input type="text" name="descroption">
            sort_order <input type="text" name="sort_order" pattern="[0-9]">
            status <input type="text" name="status" pattern="[0-1]{1}">
            <input type="submit" value="otpravit" name="otpravit">
        </form>
    <pre>
        <?php
        print_r($otvet);
        ?>
    </pre>
</body>
</html>
