<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 24.08.2017
 * Time: 16:44
 */

class Emkost {
    public $id;
    public $name;
    public $vid;
    public $deatelnost;
    public $ostatok;
    public $pl;
    public $kg;

    public $sred_chena;

    function __construct($id='',$name)
    {
        $this->id=$id;
        $this->name=$name;
    }

    function printInfa(){
        include_once '../function.php';
        $con=contecMsq();
        $zaprosVseEmkosti='SELECT * FROM emkost';
        $rezult=mysqli_query($con,$zaprosVseEmkosti);

        while ($row = mysqli_fetch_array($rezult))
        {
            echo $row['id']." | ".$row['name']." | ".$row['vid']." | ".$row['deatelnost']." | ".$row['ostatok']." | ".$row['pl']." | ".$row['kg']."<br>";
        }
    }
}