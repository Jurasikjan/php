<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 24.08.2017
 * Time: 16:41
 */


if(isset($_POST['okAdd']) && !empty($_POST['name']) && !empty($_POST['vid'])) {
    $em = new Emkost();
    $em->name=$_POST['name'];
    $em->vid=$_POST['vid'];
    $em->addEmkost();
}

$flagAdd=false;
$emk=new Emkost();
$emkosti=$emk->getAll();

if(isset($_POST['edit_delet'])) {

    foreach ($emkosti as $row) {
        if(isset($_POST['edit'.$row['id']]))
        {
            $emk->editEmkost($_POST['names'.$row['id']],$_POST['vid'.$row['id']],$row['id']);
        }
        if(isset($_POST['delet'.$row['id']]))
        {
            $emk->deleteEmkost($row['id']);
        }
    }
    $emkosti=$emk->getAll();
} //изменить удалить

if(isset($_POST['add']))
{
    $flagAdd=true;

}


echo '<table border="1">
        <tr>
                <td>name</td>                
                <td>vid</td>                
                         
                <td>ostatok</td>                
                <td>pl</td>                
                <td>kg</td>                
                <td>Изменить</td>                
                <td>Удалить</td>                
                </tr>';

echo '<form action="" method="post">';
foreach ($emkosti as $row)
{
    echo '<tr>';
    echo '<td><input class="wid" type="text" value="'.$row['namess'].'" name="names'.$row['id'].'"></td>';
    echo '<td><input class="wid" type="text" value="'.$row['vid'].'" name="vid'.$row['id'].'"></td>';

    echo '<td><input class="wid" type="text" value="'.$row['ostatok'].'" name="ostatok'.$row['id'].'"></td>';
    echo '<td><input class="wid" type="text" value="'.$row['pl'].'" name="pl'.$row['id'].'"></td>';
    echo '<td><input class="wid" type="text" value="'.$row['kg'].'" name="kg'.$row['id'].'"></td>';
    echo '<td><input class="wid" type="checkbox" name="edit'.$row['id'].'"></td>';
    echo '<td><input class="wid" type="checkbox" name="delet'.$row['id'].'"></td>';
    echo '</tr>';

}
echo '<tr><td colspan="5"></td><td colspan="2"><input type="submit" name="edit_delet" value="ok" style="width: 100%"></td></tr>';
echo '</form></table>';


if($flagAdd)
{
    echo "<form method=\"post\">
<table border=\"1\">
    <tr>
        <td>name</td>
        <td>vid</td>
    </tr>

   <tr>
       <td><input type=\"text\" value=\"\" name=\"name\"></td>
       <td><input type=\"text\" value=\"\" name=\"vid\"></td>
        </tr>

    </table>
    <input type=\"submit\" name=\"okAdd\" value=\"OK\">
</form>";//добавить emkost
}else{
    echo "<form method=\"post\">
    <input type=\"submit\" name=\"add\" value=\"Добавить\">
</form>";// кнопка добавить
}


