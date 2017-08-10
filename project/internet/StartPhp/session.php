<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 10.08.2017
 * Time: 12:47
 */

if(isset($_POST['answer3']))
{
    session_start();
    $arrAns;
    $otvet;
    $otvet=true;
    $arrAns['answer1']=$_SESSION['answer1'];
    if($arrAns['answer1']==4)
    {
        $arrAns['answer1']= $arrAns['answer1'].' DA';

    }
    else {
        $arrAns['answer1']= $arrAns['answer1'].' NO';
        $otvet=false;
    }

    $arrAns['answer2']=$_SESSION['answer2'];
    if($arrAns['answer2']==6)
    {
        $arrAns['answer2']= $arrAns['answer2'].' DA';
    }
    else {
        $arrAns['answer2']= $arrAns['answer2'].' NO';
        $otvet=false;
    }

    $arrAns['answer3']=$_POST['answer3'];
    if($arrAns['answer3']==8)
    {
        $arrAns['answer3']= $arrAns['answer3'].' DA';
    }
    else {
        $arrAns['answer3']= $arrAns['answer3'].' NO';
        $otvet=false;
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

<?php
echo 'session_id()= '.session_id();
echo '<br> session_name()= '.session_name();
echo '<br>';
if(isset($arrAns))
{
    echo 'ОТвет: <br>';
    print_r($arrAns);
    if($otvet)
    {
        echo 'Vi Proshli TEST';
    }else{
        echo 'Vi NE Proshli TEST <hr/><a href="less8/test1.php">test1</a>';
    }
}else{
    echo 'Prohodim test:<hr/> <a href="less8/test1.php">test1</a>';
}
?>


</body>
</html>
