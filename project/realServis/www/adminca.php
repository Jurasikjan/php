<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 14.08.2017
 * Time: 16:44
 */
$flagPrint=false;
include_once 'fail/conectBD.php';

if (isset($_POST['editSubOk'])) {

    for ($i=1;$i<=count($_POST);$i++)
    {
        if(isset($_POST['npz:'.$i]))
        {
            $select = "UPDATE `price` SET `npz` = '".$_POST['npz:'.$i]."',`a80` = '".$_POST['a80:'.$i]."', `dt` = '".$_POST['dt:'.$i]."', `a92` = '".$_POST['a92:'.$i]."', `a95` = '".$_POST['a95:'.$i]."' WHERE `price`.`id` =".$i;
            mysqli_query($con, $select);
        }
    }
}
if (isset($_POST['addStroky'])) {

            $select = "INSERT INTO  `adminre_price`.`price` (`id` ,`npz` ,`a80` ,`dt` ,`a92` ,`a95`)
VALUES (
NULL ,'".$_POST['npz']."','".$_POST['a80']."','".$_POST['dt']."','".$_POST['a92']."','".$_POST['a95']."'
);";
            mysqli_query($con, $select);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adminca</title>
</head>
<body>

<?php
if (isset($_POST['editSub']) || isset($_POST['deletSub'])) {

    if (isset($_POST['deletSub'])) {

        if(!empty($_POST['del'])) {
            foreach ($_POST['del'] as $k => $value) {
                $select = "DELETE FROM `price` WHERE `price`.`id` = " . $value;
                mysqli_query($con, $select);
            }
        }

    }
    else {
        $select = "UPDATE `data` SET `data` = '".$_POST['editData']."'";
        mysqli_query($con, $select);
        if(!empty($_POST['edit'])) {
            echo "<form action='adminca.php' method='post'>
                      <table>";
            echo "<tr class=\"strokaprice\">
                <td>НПЗ</td>
                <td>A-80</td>
                <td>ДT</td>
                <td>А-95</td>
                <td>А-92</td>
            </tr>";
            foreach ($_POST['edit'] as $k => $value) {




                    $select = "SELECT * FROM `price` WHERE id=" . $value;
                    $otvet = mysqli_query($con, $select);
                    $count = mysqli_num_rows($otvet);
                    if ($count) {
                        while ($row = mysqli_fetch_array($otvet)) {

                            echo "<tr>";
                            echo "<td><input type='text' value='" . $row['npz'] . "' name='npz:" . $row['id'] . "'></td>";
                            echo "<td><input type='text' value='" . $row['a80'] . "' name='a80:" . $row['id'] . "'></td>";
                            echo "<td><input type='text' value='" . $row['dt'] . "' name='dt:" . $row['id'] . "'></td>";
                            echo "<td><input type='text' value='" . $row['a95'] . "' name='a95:" . $row['id'] . "'></td>";
                            echo "<td><input type='text' value='" . $row['a92'] . "' name='a92:" . $row['id'] . "'></td>";
                            echo "</tr>";


                        }
                    }

            }
                echo "</table><input type='submit' value='Ok' name='editSubOk'></form>";
            $flagPrint=true;
        }
    }


}
if(isset($_POST['addStr']))
{
    $flagPrint=true;
    echo "<form action='adminca.php' method='post'><table style='margin: 0 auto;'>";


    echo "<tr><td>НПЗ</td><td><input type='text' name='npz'></td></tr>";
    echo "<tr><td>А80</td><td><input type='text'  name='a80'></td></tr>";
    echo "<tr><td>ДТ</td><td><input type='text'  name='dt'></td></tr>";
    echo "<tr><td>А95</td><td><input type='text'  name='a95'></td></tr>";
    echo "<tr><td>А92</td><td><input type='text' name='a92'></td></tr>";
    echo "<tr><td><input type='submit' value='Добавить' name='addStroky'></td></tr>";
    echo "</table></form>";


}
if(!$flagPrint) {
        echo "<form action=\"adminca.php\" method=\"post\"><table cellspacing=\"2\" border=\"1\" cellpadding=\"5\" style='text-align: center; margin: 0 auto;'>
       <tr class=\"strokaprice\">
           <td align=\"center\" rowspan=\"2\">НПЗ</td>
            <td colspan=\"4\"><h4>цена в гривнях за литр</h4>";

    $select_price = "SELECT * FROM `data`";
    $otv = mysqli_query($con, $select_price);
  $row = mysqli_fetch_array($otv);

                echo "</h4><input type='date' name='editData' value='".$row['data']."'></td></tr>";

    echo "

        <tr class=\"strokaprice\">
            <td>A-80</td>
            <td>ДT</td>
            <td>А-95</td>
            <td>А-92</td>
        </tr>";

        $select_price = "SELECT * FROM `price`";
        $otvet = mysqli_query($con, $select_price);
        $count = mysqli_num_rows($otvet);

        if ($count) {
            $strCvet = 0;
            while ($row = mysqli_fetch_array($otvet)) {
                if ($strCvet == 0) {
                    $strCvet = 1;
                    echo "<tr class=\"strokaprice2\">";
                    echo "  <td class=\"NPZ\">" . $row['npz'] . "</td>
                                    <td class=\"pri\">" . $row['a80'] . "</td>
                                    <td class=\"pri\">" . $row['dt'] . "</td>
                                    <td class=\"pri\">" . $row['a95'] . "</td>
                                    <td class=\"pri\">" . $row['a92'] . "</td>
                                    <td class=\"pri\"><input type='checkbox' name='edit[]' value='" . $row['id'] . "'></td>
                                    <td class=\"pri\"><input type='checkbox' name='del[]' value='" . $row['id'] . "'></td>
                                </tr>";
                } else {
                    $strCvet = 0;
                    echo "<tr class=\"strokaprice\">";
                    echo "  <td class=\"NPZ\">" . $row['npz'] . "</td>
                                    <td class=\"pri\">" . $row['a80'] . "</td>
                                    <td class=\"pri\">" . $row['dt'] . "</td>
                                    <td class=\"pri\">" . $row['a95'] . "</td>
                                    <td class=\"pri\">" . $row['a92'] . "</td>
                                    <td class=\"pri\"><input type='checkbox' name='edit[]' value='" . $row['id'] . "'></td>
                                    <td class=\"pri\"><input type='checkbox' name='del[]' value='" . $row['id'] . "'></td>
                                 </tr>";
                }

            }
            echo "<tr>
                    <td colspan='5'> <input type='submit' name='addStr' value='Добавить'><h3><a href='price.php'>Выход</a></h3></td>
                    <td><input type='submit' name='editSub' value='Редактировать'></td>
                    <td><input type='submit' name='deletSub' value='Удалить'></td>
                </tr>";
        }
        echo "</table>
    </form>";
}

?>

</body>
</html>
