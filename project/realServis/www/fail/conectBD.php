<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 14.08.2017
 * Time: 17:06
 */
$con = mysqli_connect("194.54.90.53", "adminre_yura", "55545", "adminre_price");
mysqli_set_charset($con, "utf8");

if (mysqli_connect_errno()) {
    echo "filed to connect to MySql" . mysqli_connect_error();
}