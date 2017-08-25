<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 24.08.2017
 * Time: 16:44
 */
include_once '../function.php';
class Emkost {
    public $id;
    public $name;
    public $vid;
    public $deatelnost;
    public $ostatok;
    public $pl;
    public $kg;

private $con;
    public $sred_chena;

    function __construct($id='',$name='')
    {
        $this->id=$id;
        $this->name=$name;
        $this->con=contecMsq();

    }

    function getEmkost($id){
        $zaprosVseEmkosti='SELECT * FROM emkost WHERE id='.$id;
        $rezult=mysqli_query($this->con,$zaprosVseEmkosti);
        $row = mysqli_fetch_array($rezult);
        $ret=new Emkost($row['id'],$row['name']);
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
    function printTable()
    {
        $emkost=$this->getAll();

        echo '<table border="1">
<tr>
<td>name</td>                
<td>vid</td>                
<td>deatelnost</td>                
<td>ostatok</td>                
<td>pl</td>                
<td>kg</td>                
</tr>';

foreach ($emkost as $row)
{
    echo '<tr>';
   echo '<td><input type="text" value="'.$row['name'].'" name="name'.$row['id'].'"></td>';
   echo '<td><input type="text" value="'.$row['vid'].'" name="name'.$row['id'].'"></td>';
   echo '<td><input type="text" value="'.$row['deatelnost'].'" name="name'.$row['id'].'"></td>';
   echo '<td><input type="text" value="'.$row['ostatok'].'" name="name'.$row['id'].'"></td>';
   echo '<td><input type="text" value="'.$row['pl'].'" name="name'.$row['id'].'"></td>';
   echo '<td><input type="text" value="'.$row['kg'].'" name="name'.$row['id'].'"></td>';
    echo '</tr>';

}

        echo '</table>';

    }

}