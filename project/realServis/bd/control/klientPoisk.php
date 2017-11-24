<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 16.11.2017
 * Time: 13:24
 */
include_once '../function.php';
include_once '../model/human.php';

    $human = new Human();
    $masSpisik = $human->getAll();
    $ret=array();

$col=0;
    for($i=0;$i<count($masSpisik);$i++)
    {
        $imy= $masSpisik[$i]['imy'];
        $imy=mb_strtoupper ($imy);
        $sim=mb_strtoupper ($_GET['simvol']);
        $pos=strripos($imy,$sim);

        if($pos !==false)
        {
            $col++;
            $ret['imy'][]= $masSpisik[$i]['imy'];
            $ret['id'][]= $masSpisik[$i]['id'];
            $ret['col']= $col;
        }

    }

    echo json_encode($ret,JSON_UNESCAPED_UNICODE);


?>
