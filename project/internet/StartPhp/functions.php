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