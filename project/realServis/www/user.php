<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 14.08.2017
 * Time: 15:47
 */
if(!empty($_COOKIE['name']))
{
    setcookie('name','');
    setcookie('pass','');
    header("Location: price.php");
}

if(isset($_POST['sub'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    if (empty($name) && empty($pass)) {
        echo "<h1>Введите данные</h1>";
    } else {


        include_once 'fail/conectBD.php';

        $user = mysqli_query($con, "select * from users");
        $count = mysqli_num_rows($user);

        if ($count) {
            $flag = false;
            while ($row = mysqli_fetch_array($user)) {

                if($row['name']==$name && $row['password']==$pass)
                {
                    $flag=true;
                    setcookie('name',$name);
                    setcookie('pass',$pass);
                    header("Location: price.php");
                }
            }
            if(!$flag)
            {
                echo "<h1>Неправельный логин или пароль</h1>";
            }
        }
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
        <form method="post" action="user.php">
            <table style="text-align: center; margin: 0 auto;">
                <tr>
                    <td>Login: <input type="text" name="name"></td>
                    <td>Password: <input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Вход" name="sub" style="width: 100%">
                    </td>
                </tr>
            </table>

            </pre>
        </form>
</body>
</html>
