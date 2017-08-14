<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 14.08.2017
 * Time: 10:26
 */
// INSERT INTO `adminre_price`.`price` (`npz`, `a80`, `dt`, `a95`, `a92`, `date`, `id`) VALUES ('Шебелинский ОПГКН', '', '19.1', '21.1', '19.5', '2017-08-14 00:00:00', NULL);
include_once 'fail/conectBD.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content="реал-сервис цены на нефтепродукты"/>
    <meta name="robots" content="index,follow"/>
    <meta name="keywords" content="реал-сервис цены на нефтепродукты"/>


    <title>Реал цены"</title>
    <link media="all" rel="stylesheet" href="css/all.css" type="text/css"/>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
    <!--[if lt IE 7]>
    <link rel="stylesheet" type="text/css" href="css/lt7.css" media="screen"/><![endif]-->


</head>
<body>
<div id="wrapper">
    <div id="head">
        <div id="borderlogreal">
            <h1>OOO "Реал-Сервис"</h1>
        </div>
    </div>
    <div class="text">

        <table class="tab" cellspacing="0">
            <tr class="strokaprice">
                <td align="center" rowspan="2">НПЗ</td>
                <td colspan="4"><h4>цена в гривнях за литр</h4><h4>10.08.17</h4>
                    <?php
                        if(!empty($_COOKIE['name']))
                        {
                            echo " <form action='adminca.php' method='post'><input type=\"submit\" value=\"обновить\" style=\"margin: 0 0 5px 0\"></form>";
                        }
                    ?>

                </td>

            </tr>
            <tr class="strokaprice">
                <td>A-80</td>
                <td>ДT</td>
                <td>А-95</td>
                <td>А-92</td>
            </tr>
            <?php
            $select_price="SELECT * FROM `price`";
            $otvet=mysqli_query($con,$select_price);
            $count = mysqli_num_rows($otvet);

            if($count){
                $strCvet=0;
                while ($row = mysqli_fetch_array($otvet))
                {
                    if($strCvet==0)
                    {
                        $strCvet=1;
                        echo "<tr class=\"strokaprice2\">";
                        echo "  <td class=\"NPZ\">".$row['npz']."</td>
                                <td class=\"pri\">".$row['a80']."</td>
                                <td class=\"pri\">".$row['dt']."</td>
                                <td class=\"pri\">".$row['a95']."</td>
                                <td class=\"pri\">".$row['a92']."</td>
                            </tr>";
                    }else{
                        $strCvet=0;
                        echo "<tr class=\"strokaprice\">";
                        echo "  <td class=\"NPZ\">".$row['npz']."</td>
                                <td class=\"pri\">".$row['a80']."</td>
                                <td class=\"pri\">".$row['dt']."</td>
                                <td class=\"pri\">".$row['a95']."</td>
                                <td class=\"pri\">".$row['a92']."</td>
                            </tr>";
                    }

                }
            }
            ?>
<!--            <tr class="strokaprice2">-->
<!--                <td class="NPZ">Шебелинский ОПГКН</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">19.1</td>-->
<!--                <td class="pri">21.1</td>-->
<!--                <td class="pri">19.5</td>-->
<!--            </tr>-->
<!--            <tr class="strokaprice">-->
<!--                <td class="NPZ">Мажейкяйский НПЗ</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--            </tr>-->
<!--            <tr class="strokaprice2">-->
<!--                <td class="NPZ">Мозырский НПЗ (Белоруссия)</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">19.1</td>-->
<!--                <td class="pri">21.2</td>-->
<!--                <td class="pri">22.0</td>-->
<!--            </tr>-->
<!--            <tr class="strokaprice">-->
<!--                <td class="NPZ">Новополоцк (Белоруссия)</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--            </tr>-->
<!--            <tr class="strokaprice2">-->
<!--                <td class="NPZ">Пр-во Украина</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--            </tr>-->
<!--            <tr class="strokaprice">-->
<!--                <td class="NPZ">Лукойл</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--            </tr>-->
<!--            <tr class="strokaprice2">-->
<!--                <td class="NPZ">Кременчуг</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--            </tr>-->
<!--            <tr class="strokaprice">-->
<!--                <td class="NPZ">Литва</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">19.1</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--            </tr>-->
<!--            <tr class="strokaprice2">-->
<!--                <td class="NPZ">Россия</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">19.1</td>-->
<!--                <td class="pri">-</td>-->
<!--                <td class="pri">-</td>-->
<!--            </tr>-->
        </table>


    </div>
    <div id="menu">

        <a href="index.html" onclick="location.reload();">
            <div class="knopa">О предприятии</div>
        </a>
        <a href="price.php" onclick="location.reload();">
            <div class="knopa">Цены</div>
        </a>
        <a href="kontact.html" onclick="location.reload();">
            <div class="knopa">Контакты</div>
        </a>
        <a href="avto.html" onclick="location.reload();">
            <div class="knopa">Автоуслуги</div>
        </a>
        <a href="user.php" onclick="location.reload();">

            <?php
            if(empty($_COOKIE['name']))
            {
                echo "<div class=\"knopa\">Вход</div>";
            }else{
                echo "<div class=\"knopa\">Выход</div>";
            }
            ?>
        </a>


    </div>
    <div style="height: 20px; width: 1000px; float: right;"></div>
    <div id="textSection"></div>
</div>
<script type="text/javascript" src="js/prise.js"></script>
</body>
</html>

