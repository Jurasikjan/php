
<?php
function deletCooc()
{
    echo "delet ccccccc";
    //setcookie("user",$_COOKIE["user"],time()-86400);
}
function setCooc()
{
    $cooki_name="user";
    $cooki_value="COOC_USER";
   // setcookie($cooki_name,$cooki_value,time()+86400);//создаем кукии с промежутком времени сутки
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
<?php
if(isset($_COOKIE[$cooki_name]))
{
   echo "name ".htmlentities($cooki_name);//ключ
   echo "<br> value ".htmlentities($_COOKIE[$cooki_name]);//значения
    echo "";
}


?>
    <input type="submit" value="delete" onClick="<?php deletCooc()?>">
    <input type="submit" value="setCooc" onClick="setCooc()">
</body>
</html>