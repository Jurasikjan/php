<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 24.08.2017
 * Time: 17:06
 */
class Prihod{
    public $id;
    public $id_emkost;
   public $data;
   public $id_vid;
    public $kol;
    public $pl;
    public $id_human;
    public $vid_prihod;
    public $price;

    function __construct($id='',$id_emkost='',$data='',$id_vid='',$kol='',$pl='',$id_human='',$vid_prihod='',$price='')
    {
        $this->id=$id;
        $this->id_emkost=$id_emkost;
        $this->data= $data;
        $this->id_vid= $id_vid;
        $this->kol= $kol;
        $this->pl= $pl;
        $this->id_human= $id_human;
        $this->vid_prihod= $vid_prihod;
        $this->price= $price;
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