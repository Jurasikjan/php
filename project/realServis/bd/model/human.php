<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 24.08.2017
 * Time: 17:13
 */

class Human{
    public $id;
    public $imy;
    public $con;

    function __construct($id='',$imy='')
    {
        $this->id=$id;
        $this->imy=$imy;

        $this->con=contecMsq();
    }

    function getId($id){
        $zaprosVseEmkosti='SELECT * FROM human WHERE id='.$id;
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
        $row = mysqli_fetch_array($rezult);
        $ret=new Human($row['id'],$row['imy']);
        return $ret;
    }
    function getAll(){
        $zaprosVseEmkosti='SELECT * FROM human';
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
        $ret=array();
        while ($row = mysqli_fetch_array($rezult))
        {
            $ret[]=$row;
        }

        //print_r($ret);
        return $ret;
    }

    function addThis()
    {
        $zaprosVseEmkosti="INSERT INTO `human` (`id`, `imy`) VALUES (NULL, '".$this->imy."');";
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
    }
    function deleteId($id){
        $zaprosVseEmkosti="DELETE FROM `human` WHERE `id` =".$id;
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
    }
}

?>