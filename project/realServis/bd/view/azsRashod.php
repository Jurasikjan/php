
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
$dataAzsRashod_B = new AzsRashod_B();
$human = new Human();
$zaPeriyd = $dataAzsRashod->getAll($_SESSION['otDate'], $_SESSION['doDate']);
$zaPeriyd_B = $dataAzsRashod_B->getAll($_SESSION['otDate'], $_SESSION['doDate']);

//проверяем количество
if (empty($_SESSION['azsRashodAdd']) || empty($_SESSION['azsRashodAddB'])) {
    $_SESSION['azsRashodAdd'] = 1;
    $_SESSION['azsRashodAddB'] = 1;
    $_SESSION['azsRashodMass'] = array(array());
    $_SESSION['azsRashodMassB'] = array(array());
}
//читаем из AzsRashod
if (!empty($zaPeriyd)) {
    foreach ($zaPeriyd as $str => $value) {
        $_SESSION['azsRashodMass'][$str][0] = $value['human_id'];
        $_SESSION['azsRashodMass'][$str][1] = $value['vid'];
        $_SESSION['azsRashodMass'][$str][2] = $value['kol'];
        $_SESSION['azsRashodMass'][$str][3] = $value['price'];
        $_SESSION['azsRashodMass'][$str][4] = $value['summ'];

    }
    $_SESSION['azsRashodAdd'] = count($zaPeriyd) + 1;
}
if (!empty($zaPeriyd_B)) {
    foreach ($zaPeriyd_B as $str => $value) {
        $_SESSION['azsRashodMassB'][$str][0][0] = $human->getId($value['human_id'])->imy;
        $_SESSION['azsRashodMassB'][$str][1] = $value['vid'];
        $_SESSION['azsRashodMassB'][$str][2] = $value['kol'];

    }
    $_SESSION['azsRashodAddB'] = count($zaPeriyd_B) + 1;
}
//запись
if (isset($_POST['zapisat'])) {
    $i = $_SESSION['azsRashodAdd']-1;
    $ib = $_SESSION['azsRashodAddB']-1;

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
    if (!empty($_POST['kolB_' . $ib])) {
        $_SESSION['azsRashodAddB'] += 1;
        $_SESSION['azsRashodMassB'][$ib][0][0] = $_POST['KomyB_' . $ib];
        $_SESSION['azsRashodMassB'][$ib][0][1] = $_POST['id_' . $ib];
        $_SESSION['azsRashodMassB'][$ib][1] = $_POST['VidTopB_' . $ib];
        $_SESSION['azsRashodMassB'][$ib][2] = $_POST['kolB_' . $ib];


        $dataAzsRashod_B = new AzsRashod_B('',  $_SESSION['azsRashodMassB'][$ib][0][1], $_POST['VidTopB_' . $ib], $_POST['kolB_' . $ib], $_SESSION['doDate']);
        $dataAzsRashod_B->addThis();

    }

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
            <td><input type='text' value='' name='Komy_" . $i . "'></td>
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
            <td><div id='humanserch_" . $i . "'></div><input type='text' value='" . $_SESSION['azsRashodMassB'][$i][0][0] . "' name='KomyB_" . $i . "' id='KomyB_" . $i . "' onkeyup='viborHuman(" . $i . ")' autocomplete='off'><input type='hidden' id='id_" . $i . "' name='id_" . $i . "'></td>
            ";
            }else
            {
                echo "
        <tr>
            <td><div id='humanserch_" . $i . "'></div><input type='text' value='' name='KomyB_" . $i . "' id='KomyB_" . $i . "' onkeyup='viborHuman(" . $i . ")' autocomplete='off'><input type='hidden' id='id_" . $i . "' name='id_" . $i . "'></td>
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
         <td><input id='kolB_" . $i . "' type='text' value='" . $_SESSION['azsRashodMassB'][$i][2] . "' name='kolB_" . $i. "'></td>
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

    function viborHuman(i) {
        var request;
        if (window.XMLHttpRequest) {
            request = new XMLHttpRequest();
        } else {
            request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        var sim = document.getElementById('KomyB_' + i).value;

        request.open('GET', './control/klientPoisk.php?simvol='+sim+'&i='+i);
        request.onreadystatechange = function() {
            if ((request.readyState===4) && (request.status===200)) {
                var items = JSON.parse(request.responseText);
                var output = '<select id="vibor_'+i+'" size="'+items.col+'">';
                for (var key in items.imy) {
                    output += '<option onclick="vibrat('+i+','+items.id[key]+')">' + items.imy[key] + '</option>';
                }
                output += '</select>';

                document.getElementById('humanserch_'+i).innerHTML = output;
            }
        }

        request.send();
    }
    function vibrat(i,id) {
        var sim = document.getElementById('vibor_' + i).value;
       document.getElementById('KomyB_' + i).value=sim;
        document.getElementById('humanserch_'+i).innerHTML="";
        document.getElementById('id_'+i).value=id;


    }
</script>
