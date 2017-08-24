<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 24.08.2017
 * Time: 16:52
 */
function contecMsq(){
    $con = mysqli_connect("localhost", "root", "", "real");
    mysqli_set_charset($con, "utf8");

    if (mysqli_connect_errno()) {
        echo "filed to connect to MySql" . mysqli_connect_error();
    }
    return $con;
}
function printInfa($otvet){
    while ($row = mysqli_fetch_array($otvet))
    {
        echo $row['id']." | ".$row['name']." | ".$row['descroption']." | ".$row['sort_order']." | ".$row['status']."<br>";
    }
}