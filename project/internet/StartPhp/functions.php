<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 09.08.2017
 * Time: 12:57
 */

function doSomat($times)
{
    $r = '';
    for ($i=1;$i<=$times;$i++) {
        $r.=$i;
    }
    return $r.='<br/>';
}

function quadratic($a, $b, $c){
    $d=($b*$b)-(4*$a*$c);

    if($d < 0){
        return false;
    }elseif ($d > 0){
        $x1=(-$b-sqrt($d)/(2 *$a));
        $x2=(-$b+sqrt($d)/(2 *$a));
        return array('x1' => $x1,'x2' => $x2);
    }
}