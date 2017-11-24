<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 31.08.2017
 * Time: 10:29
 */

include_once 'model/emkost.php';
include_once 'model/prihod.php';
include_once 'model/vid.php';
include_once 'model/vidPrihod.php';




$pr='<form action="" method="post">';

switch ($_COOKIE['yr'])
{
    case 1://admin
       $pr.=' <input type="submit" value="vseEmkosti" name="vseEmkosti">
            <input type="submit" value="prihod" name="prihod">
            <input type="submit" value="azsRashod" name="azsRashod">';
        break;

    case 2://prosmotr;
       $pr.=' <input type="submit" value="vseEmkosti" name="vseEmkosti">';

        break;

    case 3://zapolnenieAZS;
       $pr.='
            <input type="submit" value="azsRashod" name="azsRashod">';
        break;
}

$pr.=" </form>";

echo $pr;
?>

<hr>
