<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 10.08.2017
 * Time: 15:12
 */

session_start();
$_SESSION['answer1']=$_POST['answer1'];
?>
<p>Вопрос 2</p>
<p>3+3=?</p>

<form action="test3.php" method="post">
    <input type="text" name="answer2">
    <input type="submit">
</form>
