<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css.css">
    <title>Document</title>
    <style type="text/css">
        .wid {
            width: 100%; /* Ширина в пикселах */
        }
    </style>
</head>
<body>
    <header>
        <?php
          include_once 'view/header.php';
        ?>
    </header>

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
    if(isset($_POST['prihod'])){
            include 'view/prihod.php';
    }

    //azsRashod
    if(isset($_POST['azsRashod'])){
        if($_SESSION['azsRashod'])
        {
            $_SESSION['azsRashod']=false;
        }else $_SESSION['azsRashod']=true;

    }else {
        $_SESSION['azsRashod']=false;
        $_SESSION['azsRashodAdd']=0;
    }
    if(!empty($_SESSION['azsRashod']))
    {
        include 'view/azsRashod.php';
    }



    print_r($_POST);
    print_r($_SESSION);
  //  echo "SESSION "; print_r($_SESSION);
    ?>
</body>
</html>
