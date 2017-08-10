<?php
if(isset($_POST['delete']))
{
    setcookie('name','');
    setcookie('pass','');
    header("Location: cooci.php");
}
if(isset($_POST['sub']))
{
    if(!empty($_POST['name']) && !empty($_POST['pass'])){

        $name=$_POST['name'];
        $pass=$_POST['pass'];
        setcookie('name',$name,time()+3600);
        setcookie('pass',$pass);
        header("Location: cooci.php");
    }
}
if(isset($_COOKIE['name'])){
    echo '<pre>';
    print_r($_COOKIE);
    echo '</pre>';
    $name=$_COOKIE['name'];
    echo '<form action="cooci.php" method="post"><input type="submit" value="delete" name="delete"></form>';

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
    <title>Document</title>
</head>
<body>
        <h1>Stranica 1</h1>
        <h2>HELLO : <?php echo $name?></h2>
<a href="coociPage.php">coociPage</a>
<form action="cooci.php" method="post">
    Name: <input type="text" name="name">
    Password: <input type="password" name="pass">
    <input type="submit" value="otpr" name="sub">
</form>
</body>
</html>
