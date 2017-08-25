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
function getTable($zapros){
    while ($row = mysqli_fetch_array($zapros))
    {
        echo $row['id']." | ".$row['name']." | ".$row['descroption']." | ".$row['sort_order']." | ".$row['status']."<br>";
    }
}