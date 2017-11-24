<?php
session_start();
include_once 'function.php';
include_once './control/setcooc.php';

if(!isset($_SESSION['otDate']))
{
    $_SESSION['otDate']=date("Y-m-d");
    $_SESSION['doDate']=date("Y-m-d");
}
if(isset($_POST['OtdateDb']))
{
    $_SESSION = array();
    $_SESSION['otDate']=$_POST['OtdateDb'];
    $_SESSION['doDate']=$_POST['DodateDb'];

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="cssF.css">
    <title>Document</title>

</head>
<body>
    <header>
        <?php
          include_once 'view/header.php';
        ?>
    </header>
    <form method="post">
        <h3 style="text-align: center">От <input type="date" value="<?php echo $_SESSION['otDate'];?>" name="OtdateDb"> До            <input type="date" value="<?php echo $_SESSION['doDate'];?>" name="DodateDb"><input type="submit" value="Ok"></h3>

    </form>

    <?php
    if(isset($_POST['vseEmkosti']) ||  $_SESSION['vseEmkosti']){

        if($_SESSION['vseEmkosti'] && $_POST['vseEmkosti'])
            $_SESSION['vseEmkosti']=false;
        else{
            include 'view/vseEmkosti.php';
            $_SESSION['vseEmkosti']=true;
        }

    }

    //prihod
    if (isset($_POST['prihod']) || $_SESSION['prihod']) {

        if ($_POST['prihod'] && $_SESSION['prihod']) {
            $_SESSION['prihod']=false;
        }else {
            include 'view/prihod.php';
            $_SESSION['prihod']=true;
        }

    }
    //azsRashod

    if (isset($_POST['azsRashod']) || $_SESSION['azsRashod']) {

        if ($_POST['azsRashod'] && $_SESSION['azsRashod']) {
            $_SESSION['azsRashod']=false;
        }else {
            include 'view/azsRashod.php';
            $_SESSION['azsRashod']=true;
        }

    }



echo "<pre>";
    echo "POST";
    print_r($_POST);
    print_r($_SESSION);

echo "</pre>";
    ?>
</body>
</html>
