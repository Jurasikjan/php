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


//SELECT ято выбрать
//FROM таблица
//where условия
//group by поле
//order by поле
//limit количество

//$row1 = mysqli_fetch_array($otvet); // возвращает строку ПО ОЧЕРЕДИ

//  Агригатные функции
//
//count - количество строк в таблице
//sum - сумма значения выброного поля
//avg - среднее значения по выброному полю
//max min - наибольшее и наименьшее значения данного поля

//select count (*) from news;
//select count (*) from news where id=1;
//select MAX (id) from news;
//select MAX (id) AS max from news; переименновывает поле в результате


//select * from news GROUP BY content ; в результате выводит неповторяющиеся даные с этой  колонке


//select name, count(*) from user group by name; в результате групировка по именни плюс еще колонка
// count количество одинаковых имен



$con = conectToMysql();
if(isset($_POST['otpravit']))
{

//   $ins= "INSERT INTO `news_category` (`name`, `descroption`,sort_order,status) VALUES ('".$_POST['name']."', '".$_POST['descroption']."')";
$ins= "INSERT INTO `news_category` (`name`, `descroption`,sort_order,status) VALUES ('%s','%s','%d','%d')";
$ins=sprintf($ins,$_POST['name'],$_POST['descroption'],$_POST['sort_order'],$_POST['status']);
$info=mysqli_query($con,$ins);
var_dump($info+' zapros');
}

$select_news_category="SELECT * FROM `news_category`";
$otvet=mysqli_query($con,$select_news_category);

$count = mysqli_num_rows($otvet);// количество записей
//$row1 = mysqli_fetch_array($otvet); // возвращает строку ПО ОЧЕРЕДИ
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
        <br>
        <?php
        if($count){
            while ($row = mysqli_fetch_array($otvet))
            {
                echo $row['id']." | ".$row['name']." | ".$row['descroption']." | ".$row['sort_order']." | ".$row['status']."<br>";
            }
        }
        ?>
    </pre>
</body>
</html>
