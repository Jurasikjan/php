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

<form action="" method="post">
    <p>Name: <input type="text" name="name"></p>
    <p>Ege: <input type="text" name="ege"></p>
    <p><input type="submit"></p>
</form>

<?php
if($_POST['name']!=null)//проверка
{
    echo "Hay ".htmlspecialchars($_POST['name'])."<br> Vam ".htmlspecialchars($_POST['ege'])." let<br>";
    echo (int)$_POST['ege']." (int)\$_POST['ege'] привидения типов<br>";
echo "htmlspecialchars(\$_POST['name']) кодировка символов чтобы не вставить вредоносную javascript";
}

?>
<br>
<br><b>Метход GET </b><br>
<form action="" method="get">
    <p>Name: <input type="text" name="name"></p>
    <p>Ege: <input type="text" name="ege"></p>
    <p><input type="submit"></p>
</form>

<?php
if($_GET['name']!=null)//проверка
{
    echo " Метод GET Hay ".htmlspecialchars($_GET['name'])."<br> Vam ".htmlspecialchars($_GET['ege'])." let<br>";
}

?>

<br>
<br><b>данные из адресной строки $_SERVER['QUERY_STRING'] </b><br>
<?php
echo "Данные {$_SERVER['QUERY_STRING']}";
?>

<br>
<br><b>Хранения несколько значений в массиве </b><br>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
    <legend>ВЫберете животное</legend>
    <label for="dog">
        <input type="checkbox" id="dog" name="animal[]" value="dog">Собака
    </label>
    <label for="cat">
        <input type="checkbox" id="cat" name="animal[]" value="cat">cat
    </label>
    <label for="tiger">
        <input type="checkbox" id="tiger" name="animal[]" value="tiger">tiger
    </label>
</fieldset>
    <input type="submit" value="otpr">
</form>
<?php
echo "htmlentities переводит все html  символы в сущьности плюс кодировка как в  htmlspecialchars<br>";
echo $_SERVER['PHP_SELF']." ---  \$_SERVER['PHP_SELF'] переменная содержащая имя скрипта<br>";

$animal= isset($_POST['animal']) ? $_POST['animal']:'';//проверяем существует ли $_POST['animal']
if(!empty($animal))// проверка есть ли чтото
{
    echo "<br> выброоны ";
    foreach ($animal as $a)
    {
        echo "<br><span style='color: red'>".htmlentities($a)."</span>";
    }
}
?>
</body>
</html>