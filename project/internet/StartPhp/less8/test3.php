<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 10.08.2017
 * Time: 15:12
 */
session_start();
$_SESSION['answer2']=$_POST['answer2'];
?>

<p>Вопрос 3</p>
<p>4+4=?</p>

<form action="../session.php" method="post">
    <input type="text" name="answer3">
    <input type="submit">
</form>
