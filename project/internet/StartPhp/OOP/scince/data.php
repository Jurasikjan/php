<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 18.08.2017
 * Time: 9:32
 */

require_once 'classes.php';

$pulications = array();

//$news1= new NewsPublication();
//$news2= new NewsPublication();
//$news3= new NewsPublication();
//
//$article1 = new ArticlePublication();
//$article2 = new ArticlePublication();
//
//$photo1= new PhotoReportPublication();
//$photo2= new PhotoReportPublication();
//
//$pulications = array($news1,$news2,$news3,$article1,$article2,$photo1,$photo2);


$con = mysqli_connect("localhost","root","","scince");
if(mysqli_connect_errno()){
    echo "Mysql - ".mysqli_connect_error();
}

$rezult = mysqli_query($con,"select * from publication");

while ($row=mysqli_fetch_array($rezult))
{
    $pulications[] = new $row['type']($row);
}