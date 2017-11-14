<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 24.08.2017
 * Time: 16:44
 */


class Emkost{
    public $id;
    public $name;
    public $vid;

    public $ostatok;
    public $pl;
    public $kg;

    private $con;
    public $sred_chena;

    function __construct($id='',$name='',$vid='',$ostatok='',$pl='',$kg='',$sred_chena='')
    {
        $this->id=$id;
        $this->name=$name;
        $this->vid=$vid;
        $this->ostatok=$ostatok='';
        $this->pl=$pl;
        $this->kg=$kg;
        $this->sred_chena=$sred_chena;

        $this->con=contecMsq();

    }

    function getId($id){
        $zaprosVseEmkosti='SELECT * FROM emkost WHERE id='.$id;
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
        $row = mysqli_fetch_array($rezult);
        $ret=new Emkost($row['id'],$row['name']);
        return $ret;
    }
    function getName($name){
        $zaprosVseEmkosti="SELECT * FROM emkost WHERE namess='".$name."'";
       // print_r($zaprosVseEmkosti);
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
        $row = mysqli_fetch_array($rezult);
       // print_r($row);
        $ret=new Emkost($row['id'],$row['namess'],$row['vid'],$row['ostatok'],$row['pl'],$row['kg'],$row['sred_chena']);
        return $ret;
    }
    function getAll(){
        $zaprosVseEmkosti='SELECT * FROM emkost';
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
        $ret=array();
        while ($row = mysqli_fetch_array($rezult))
        {
            $ret[]=$row;
        }
        return $ret;
    }

     function addEmkost()
    {
        $zaprosVseEmkosti="INSERT INTO `emkost` (`id`, `name`, `vid`) VALUES (NULL, '".$this->name."','".$this->vid."');";
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
    }
    function deleteEmkost($id){
        $zaprosVseEmkosti="DELETE FROM `emkost` WHERE `emkost`.`id` =".$id;
       // print_r($zaprosVseEmkosti);
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
    }
    function editEmkost($name,$vid, $id){
        $zaprosVseEmkosti="UPDATE `emkost` SET `vid` = '".$vid."',`namess` = '".$name."' WHERE `emkost`.`id` =".$id;
       // print_r($zaprosVseEmkosti);
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
    }

}