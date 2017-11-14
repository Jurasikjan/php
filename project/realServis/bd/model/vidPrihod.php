<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 26.09.2017
 * Time: 16:24
 */
class vidPrihod{
    public $id;
    public $vid;

    private $con;

    function __construct($id='',$vid='')
    {
        $this->id=$id;
        $this->vid=$vid;
        $this->con=contecMsq();
    }

    function getId($id){
        $zaprosVseEmkosti='SELECT * FROM vid_prihod WHERE id='.$id;
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
        $row = mysqli_fetch_array($rezult);
        $ret=new vidPrihod($row['id'],$row['vid']);
        return $ret;
    }
    function getAll(){
        $zaprosVseEmkosti='SELECT * FROM vid_prihod';
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
        $zaprosVseEmkosti="INSERT INTO `vid` (`id`, `vid`) VALUES (NULL, '".$this->vid."');";
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
    }
    function deleteId($id){
        $zaprosVseEmkosti="DELETE FROM `vid` WHERE `vid`.`id` =".$id;
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
    }
}