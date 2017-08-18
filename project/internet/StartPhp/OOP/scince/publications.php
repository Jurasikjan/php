<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 18.08.2017
 * Time: 9:33
 */

require_once 'data.php';

foreach ($pulications as $item){
    echo '<pre>';
    print_r($item->printItem());
    echo '</pre>';
}