<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 31.08.2017
 * Time: 10:38
 */

class Vid {
    public $id;
    public $topliva;

    private $con;

    function __construct($id='',$toplivo='')
    {
        $this->id=$id;
        $this->topliva=$toplivo;
        $this->con=contecMsq();
    }

    function getId($id){
        $zaprosVseEmkosti='SELECT * FROM vid WHERE id='.$id;
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
        $row = mysqli_fetch_array($rezult);
        $ret=new Vid($row['id'],$row['toplivo']);
        return $ret;
    }
    function getAll(){
        $zaprosVseEmkosti='SELECT * FROM vid';
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
        $ret=array();
        while ($row = mysqli_fetch_array($rezult))
        {
            $ret[]=$row;
        }
        return $ret;
    }

    function addThis()
    {
        $zaprosVseEmkosti="INSERT INTO `vid` (`id`, `toplivo`) VALUES (NULL, '".$this->topliva."');";
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
    }
    function deleteId($id){
        $zaprosVseEmkosti="DELETE FROM `vid` WHERE `vid`.`id` =".$id;
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
    }
}