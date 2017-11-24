<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 17.11.2017
 * Time: 10:34
 */
class AzsRashod {
    public $id;
    public $human_id;
    public $vid;
    public $kol;
    public $price;
    public $summ;
    public $date;

    public $con;
    public $allAzsRashod;
    function __construct($id='',$human_id='',$vid='',$kol='',$price='',$summ='',$date='')
    {
        $this->id=$id;
        $this->human_id=$human_id;
        $this->vid=$vid;
        $this->kol=$kol;
        $this->price=$price;
        $this->summ=$summ;
        $this->date=$date;

        $this->con=contecMsq();
    }

    function getId($id){
        $zaprosVseEmkosti='SELECT * FROM azsrashod WHERE id='.$id;
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
        $row = mysqli_fetch_array($rezult);
        $ret=new Human($row['id'],$row['imy']);
        return $ret;
    }
    function getAll($otDate='',$doDate=''){
        $zaprosVseEmkosti="";
        if(empty($otDate) || empty($doDate)) {
            $zaprosVseEmkosti = 'SELECT * FROM azsrashod';
        }else{
            if(empty($doDate))
            {
                $zaprosVseEmkosti="SELECT * FROM azsrashod WHERE Ddate \"".$doDate."\"";
            }else{
                $zaprosVseEmkosti='SELECT * FROM azsrashod WHERE Ddate BETWEEN \''.$otDate.'\' AND \''.$doDate.'\'';
            }
        }
        $rezult = mysqli_query($this->con, $zaprosVseEmkosti);
        $ret = array();
        while ($row = mysqli_fetch_array($rezult)) {
            $ret[] = $row;
        }
        $this->allAzsRashod = $ret;
        return $ret;
    }

    function addThis()
    {
        $zaprosVseEmkosti="INSERT INTO `azsrashod` (id, human_id,vid,kol,price,summ,Ddate) VALUES (NULL,".$this->human_id.",'".$this->vid."',".$this->kol.",".$this->price.",".$this->summ.",'".$this->date."');";

        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
    }
    function deleteId($id){
        $zaprosVseEmkosti="DELETE FROM `human` WHERE `id` =".$id;
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
    }
    function edit($id='',$human_id='',$vid='',$kol='',$price='',$summ='',$date='')
    {

        $set="";
        if(!empty($human_id))
        {
            $set+="human_id = '".$human_id."'";
        }
        if(!empty($vid))
        {
            $set+=",vid = '".$vid."'";
        }
        if(!empty($kol))
        {
            $set+=",kol = '".$kol."'";
        }
        if(!empty($price))
        {
            $set+=",price = '".$price."'";
        }
        if(!empty($summ))
        {
            $set+=",summ = '".$summ."'";
        }
        if(!empty($date))
        {
            $set+=",date = '".$date."'";
        }

        $zapros="UPDATE `azsrashod` SET ".$set." WHERE `azsrashod`.`id` =".$id.";";
        $rezult=mysqli_query($this->con,$zapros);
    }
}
class AzsRashod_B {
    public $id;
    public $human_id;
    public $vid;
    public $kol;
    public $date;

    public $con;
    public $allAzsRashod;
    function __construct($id='',$human_id='',$vid='',$kol='',$date='')
    {
        $this->id=$id;
        $this->human_id=$human_id;
        $this->vid=$vid;
        $this->kol=$kol;
        $this->date=$date;

        $this->con=contecMsq();
    }

    function getId($id){
        $zaprosVseEmkosti='SELECT * FROM azsrashod_b WHERE id='.$id;
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
        $row = mysqli_fetch_array($rezult);
        $ret=new Human($row['id'],$row['imy']);
        return $ret;
    }
    function getAll($otDate='',$doDate=''){
        $zaprosVseEmkosti="";
        if(empty($otDate) || empty($doDate)) {
            $zaprosVseEmkosti = 'SELECT * FROM azsrashod_b';
        }else{
            if(empty($doDate))
            {
                $zaprosVseEmkosti="SELECT * FROM azsrashod_b WHERE Ddate \"".$doDate."\"";
            }else{
                $zaprosVseEmkosti='SELECT * FROM azsrashod_b WHERE Ddate BETWEEN \''.$otDate.'\' AND \''.$doDate.'\'';
            }
        }
        $rezult = mysqli_query($this->con, $zaprosVseEmkosti);
        $ret = array();
        while ($row = mysqli_fetch_array($rezult)) {
            $ret[] = $row;
        }
        $this->allAzsRashod = $ret;
        return $ret;
    }

    function addThis()
    {
        $zaprosVseEmkosti="INSERT INTO `azsrashod_b` (id, human_id,vid,kol,Ddate) VALUES (NULL,".$this->human_id.",'".$this->vid."',".$this->kol.",'".$this->date."');";
echo $zaprosVseEmkosti;
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
    }
    function deleteId($id){
        $zaprosVseEmkosti="DELETE FROM `human` WHERE `id` =".$id;
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
    }
    function edit($id='',$human_id='',$vid='',$kol='',$date='')
    {

        $set="";
        if(!empty($human_id))
        {
            $set+="human_id = '".$human_id."'";
        }
        if(!empty($vid))
        {
            $set+=",vid = '".$vid."'";
        }
        if(!empty($kol))
        {
            $set+=",kol = '".$kol."'";
        }
        if(!empty($date))
        {
            $set+=",date = '".$date."'";
        }

        $zapros="UPDATE `azsrashod_b` SET ".$set." WHERE `azsrashod`.`id` =".$id.";";
        $rezult=mysqli_query($this->con,$zapros);
    }
}