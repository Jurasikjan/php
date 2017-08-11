<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 11.08.2017
 * Time: 13:45
 */
function conectToMysql()
{
    $con = mysqli_connect("localhost", "root", "", "testsite");
    mysqli_set_charset($con, "utf8");

    if (mysqli_connect_errno()) {
        echo "filed to connect to MySql" . mysqli_connect_error();
    }
    return $con;
}