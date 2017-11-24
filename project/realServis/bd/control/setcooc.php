<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 23.11.2017
 * Time: 15:33
 */
$err="";
$con = contecMsq();

if(isset($_POST['polzovatelOk'])) {
    if (empty($_POST['name']) || empty($_POST['pass'])) {
        $err = "Ввыдите пароль или логин";
    } else {
        $zapros = 'SELECT * FROM polzovatel WHERE imy=\'' . $_POST['name'] . '\' and ' . 'parol=' . $_POST['pass'];

        $rezult = mysqli_query($con, $zapros);
        $ret = array();

        while ($row = mysqli_fetch_array($rezult)) {
            $ret[] = $row;
        }
        if (empty($ret)) {
            $err = "Неправельный пароль или логин";
        } else {

            setcookie("name", $ret[0]['imy']);
            setcookie("parol", $ret[0]['parol']);
            setcookie("yr", $ret[0]['yroven']);

            header('Location:/project/realServis/bd');
        }

    }

}

if(isset($_POST['exit']))
{
    setcookie("name", "");
    setcookie("parol","");
    setcookie("yr","");

    header('Location:/project/realServis/bd');

}

if (!empty($_COOKIE['name'])) {

    $zapros = 'SELECT * FROM polzovatel WHERE imy=\'' . $_COOKIE['name'] . '\' and ' . 'parol=' . $_COOKIE['parol'];

    $rezult = mysqli_query($con, $zapros);
    $ret = array();
    while ($row = mysqli_fetch_array($rezult)) {
        $ret[] = $row;
    }
    if (empty($ret)) {
        $err = "Неправельный пароль или логин";
        setcookie("name", "");
        setcookie("parol","");
        setcookie("yl","");
    } else {
        echo '<form action="" method="post">
                        <input type="submit" value="Выход" name="exit">
                </form>';
    }

}else{
    echo '<form action="" method="post">
                        Имя: <input type="text"  name="name">
                        Пароль: <input type="password"  name="pass">
                        <input type="submit" value="Ok" name="polzovatelOk">
                </form>';

}

echo "<h2>$err</h2>";
