
<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 14.11.2017
 * Time: 12:54
 */
include_once './model/azsRashod.php';
include_once './model/human.php';

$vid=new Vid();
$dataAzsRashod = new AzsRashod();
$human = new Human();
$zaPeriyd = $dataAzsRashod->getAll($_SESSION['otDate'], $_SESSION['doDate']);


//читаем из AzsRashod
if (!empty($zaPeriyd)) {
    foreach ($zaPeriyd as $str => $value) {
        $_SESSION['azsRashodMass'][$str][0] = $human->getId($value['human_id'])->imy;
        $_SESSION['azsRashodMass'][$str][1] = $value['vid'];
        $_SESSION['azsRashodMass'][$str][2] = $value['kol'];
        $_SESSION['azsRashodMass'][$str][3] = $value['price'];
        $_SESSION['azsRashodMass'][$str][4] = $value['summ'];

    }
    $_SESSION['azsRashodAdd'] = count($zaPeriyd) + 1;
}
//запись
if (isset($_POST['zapisat'])) {
    $i = $_SESSION['azsRashodAdd']-1;

    if (!empty($_POST['kol_' . $i])) {
        $_SESSION['azsRashodAdd']+=1;
        $_SESSION['azsRashodMass'][$i][0] = $_POST['Komy_' . $i];
        $_SESSION['azsRashodMass'][$i][1] = $_POST['VidTop_' . $i];
        $_SESSION['azsRashodMass'][$i][2] = $_POST['kol_' . $i];
        $_SESSION['azsRashodMass'][$i][3] = $_POST['price_' . $i];
        $_SESSION['azsRashodMass'][$i][4] = $_POST['summ_' . $i];

        $dataAzsRashod = new AzsRashod('', 3, $_POST['VidTop_' . $i], $_POST['kol_' . $i], $_POST['price_' . $i], $_POST['summ_' . $i], $_SESSION['doDate']);
        $dataAzsRashod->addThis();

    }

    //Beznal
    $adB = 0;
    for ($i = 0; $i < $_SESSION['azsRashodAddB']; $i++) {
        if (!empty($_POST['kolB_' . $i])) {

            $_SESSION['azsRashodMassB'][$i][0] = $_POST['KomyB_' . $i];
            $_SESSION['azsRashodMassB'][$i][1] = $_POST['VidTopB_' . $i];
            $_SESSION['azsRashodMassB'][$i][2] = $_POST['kolB_' . $i];
            $_SESSION['azsRashodMassB'][$i][3] = $_POST['priceB_' . $i];
            $_SESSION['azsRashodMassB'][$i][4] = $_POST['summB_' . $i];

        } else {
            $adB++;
        }
    }
    if ($adB == 0) {
        $_SESSION['azsRashodAddB'] += 1;
    }

}
//проверяем количество
if (empty($_SESSION['azsRashodAdd']) || empty($_SESSION['azsRashodAddB'])) {
    $_SESSION['azsRashodAdd'] = 1;
    $_SESSION['azsRashodAddB'] = 1;
    $_SESSION['azsRashodMass'] = array(array());
    $_SESSION['azsRashodMassB'] = array(array());
}


if(isset($_POST['klientPoisk'])){
    list($name,$id)=explode('_',$_POST['klientPoisk']);
    $_SESSION['azsRashodMassB'][$_POST['str']][0]=$name;
}
?>
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

                    for ($i=0;$i<$_SESSION['azsRashodAdd'];$i++)
                    {
                        if(!empty($_SESSION['azsRashodMass'][$i][0])) {
                            echo "
        <tr>
            <td><input type='text' value='" . $_SESSION['azsRashodMass'][$i][0] . "' name='Komy_" . $i . "'></td>
            ";
                        }else
                        {
                            echo "
        <tr>
            <td><input type='text' value='потребитель' name='Komy_" . $i . "'></td>
            ";
                        }
                        echo "
            <td>
                <select name='VidTop_".$i."'>
                    ";
                        foreach ($vid->getAll() as $row)
                        {
                            if ($_SESSION['azsRashodMass'][$i][1] == $row['toplivo']) {
                                echo "<option name='vid' selected>" . $row['toplivo'] . "</option>";
                            } else
                                echo "<option name='vid'>".$row['toplivo']."</option>";
                        }

                        echo "
                </select>
            </td>
         <td><input id='kol_" . $i . "' type='text' value='" . $_SESSION['azsRashodMass'][$i][2] . "' name='kol_" . $i . "' onkeyup='summ(\"" . $i . "\")'></td>
           <td><input id='price_" . $i . "' type='text' value='" . $_SESSION['azsRashodMass'][$i][3] . "' name='price_" . $i . "' onkeyup='summ(\"" . $i . "\")'></td>
           <td><input  id='summ_" . $i . "' type='text' value='" . $_SESSION['azsRashodMass'][$i][4] . "' name='summ_" . $i . "'></td>
        </tr>";
                    }
                ?>
    </table>

        </td>
        <td>
    <h2>б\н</h2>
    <table>
        <tr>
            <td>Кому</td>
            <td width="50px">Вид топлива</td>
            <td>кол-во</td>
        </tr>

        <?php

        for ($i=0;$i<$_SESSION['azsRashodAddB'];$i++)
        {
            if(!empty($_SESSION['azsRashodMassB'][$i][0])) {
                echo "
        <tr>
            <td><input type='text' value='" . $_SESSION['azsRashodMassB'][$i][0] . "' name='KomyB_" . $i . "'><a href='view/klientPoisk.php?i=".$i."'>Выбор...</a></td>
            ";
            }else
            {
                echo "
        <tr>
            <td><input type='text' value='' name='KomyB_" . $i . "'><a href='view/klientPoisk.php?i=".$i."'>Выбор...</a></td>
            ";
            }
            echo "
            <td>
                <select name='VidTopB_".$i."'>
                    ";
            foreach ($vid->getAll() as $row)
            {
                if ($_SESSION['azsRashodMassB'][$i][1] == $row['toplivo']) {
                    echo "<option name='vid' selected>" . $row['toplivo'] . "</option>";
                } else
                    echo "<option name='vid'>".$row['toplivo']."</option>";
            }

            echo "
                </select>
            </td>
         <td><input id='kolB_" . $i . "' type='text' value='" . $_SESSION['azsRashodMassB'][$i][2] . "' name='kolB_" . $i . "' onchange='summ(\"" . $i . "\")'></td>
            </tr>";
        }
        ?>
    </table>

        </td>
    </tr>
</table>
    <input type="submit" value="zapisat" name="zapisat">
</form>
<script>

    function summ(i) {

        var n1 = document.getElementById('price_' + i).value;
        var n2 = document.getElementById('kol_' + i).value;
        document.getElementById('summ_' + i).value = n1 * n2;
    }

</script>
