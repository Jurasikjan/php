<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 01.09.2017
 * Time: 12:44
 */
$vid=new Vid();
$emkost=new Emkost();
$vidPrihod= new vidPrihod();
?>

<form method="post">
    <h3>Приход</h3>
    <table>
        <tr style="text-align: center">
            <td>emkost</td>
            <td>data</td>
            <td>vid</td>
            <td>kol</td>
            <td>pl</td>
            <td>human<br> <a href="" onclick="">Выб...</a><br><a href="">Новый</a></td>
            <td>vid_prihod</td>
            <td>price</td>

        </tr>

            <tr>
                <td><select name="emkost">
                        <?php
                        echo "<option name='emkostName'>-</option>";
                        foreach ($emkost->getAll() as $row)
                        {
                            echo "<option name='emkostName'>".$row['namess']."</option>";
                        }
                        ?>
                    </select></td>
                <td><input type="date" name="data" value="<?php echo date("Y-m-d");?>"></td>
                <td><select name="vidToplivo">
                        <?php
                        foreach ($vid->getAll() as $row)
                        {
                            echo "<option name='vid'>".$row['toplivo']."</option>";
                        }
                        ?>
                    </select></td>
                <td><input type="text" name="kol" class="wid"></td>
                <td><input type="text" name="pl" class="wid"></td>
                <td><input type="text" name="human" class="wid"></td>
                <td><select name="vid_prihod">
                        <?php
                        foreach ($vidPrihod->getAll() as $row)
                        {
                            echo "<option name='vidPrihod'>".$row['vid']."</option>";
                        }
                        ?>
                    </select></td>
                <td><input class="wid" type="text" name="price"></td>
            </tr>
    </table>
    <input type="submit" value="OK" name="addPrihod" onclick="alertPrihod()">
</form>


