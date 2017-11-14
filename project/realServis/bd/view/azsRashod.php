<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 14.11.2017
 * Time: 12:54
 */
$vid=new Vid();
?>
<style >
   td input {
        width: 50px;
    }
</style>
<h1 style="text-align: center"><input type="date" value="<?php echo date("Y-m-d");?>" name="data"></h1>
<form method="post" action="">

<table style="border: 0px">
    <tr>
        <td>

    <h2>Наличный</h2>
    <table>
        <tr>
            <td>Кому</td>
            <td width="50px">Вид топлива</td>
            <td>кол-во</td>
            <td>Цена</td>
            <td>Сумма</td>
        </tr>

                <?php
                    $_SESSION['azsRashodAdd']+=1;
                    for ($i=0;$i<$_SESSION['azsRashodAdd'];$i++)
                    {
                        echo "
        <tr>
            <td><input type='text' value='потребитель' name='Komy_".$i."'></td>
            <td>
                <select name='VidTop_".$i."'>
                    ";
                        foreach ($vid->getAll() as $row)
                        {
                            echo "<option name='vid'>".$row['toplivo']."</option>";
                        }

                        echo "
                </select>
            </td>
           <td><input type='text' value='".$_SESSION['kol_'.$i.'']."' name='kol_".$i."'></td>
           <td><input type='text' value='".$_SESSION['price_'.$i.'']."' name='price_".$i."'></td>
           <td><input type='text' value='".$_SESSION['summ_'.$i.'']."' name='summ_".$i."'></td>
        </tr>";
                    }
                ?>
    </table>
            <input type="submit" value="zapisat" name="zapisat">
        </td>
        <td>
    <h2>б\н</h2>
    <table>
        <tr>
            <td>Кому</td>
            <td width="50px">Вид топлива</td>
            <td>кол-во</td>
            <td>Цена</td>
            <td>Сумма</td>
        </tr>

        <?php
        $_SESSION['azsRashodAdd']+=1;
        for ($i=0;$i<$_SESSION['azsRashodAdd'];$i++)
        {
            echo "
        <tr>
            <td><input type='text' value='' name='BKomy_".$i."'>
            <a href=''>выбрать</a></td>
            <td>
                <select name='BVidTop_".$i."'>
                    ";
            foreach ($vid->getAll() as $row)
            {
                echo "<option name='Bvid'>".$row['toplivo']."</option>";
            }

            echo "
                </select>
            </td>
           <td><input type='text' value='".$_SESSION['Bkol_'.$i.'']."' name='Bkol_".$i."'></td>
           <td><input type='text' value='".$_SESSION['Bprice_'.$i.'']."' name='Bprice_".$i."'></td>
           <td><input type='text' value='".$_SESSION['Bsumm_'.$i.'']."' name='Bsumm_".$i."'></td>
        </tr>";
        }
        ?>
    </table>

        </td>
    </tr>
</table>

</form>