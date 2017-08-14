<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 14.08.2017
 * Time: 16:44
 */
include_once 'fail/conectBD.php';

if (isset($_POST['Ok'])) {
//UPDATE `price` SET `npz` = 'Шебелинский ОПГКНs' WHERE `price`.`id` = 1;
    session_start();
    $select = "UPDATE `price` SET `npz` = 'Шебелинский ОПГКНs' WHERE `price`.`id` = " . $_SESSION['idEdit'];
    mysqli_query($con, $select);
    header("Location: adminca.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
if (isset($_POST['edit']) || isset($_POST['del'])) {
    if (isset($_POST['del'])) {
        $select = "DELETE FROM `price` WHERE `price`.`id` = " . $_POST['del'];
        mysqli_query($con, $select);
        header("Location: adminca.php");
    } else {
        $select = "SELECT * FROM `price` WHERE id=" . $_POST['edit'];
        $otvet = mysqli_query($con, $select_price);
        $count = mysqli_num_rows($otvet);
        if ($count) {
            $strCvet = 0;
            echo "<form action='adminca.php' method='post'>
                      <table>";
            echo "<tr class=\"strokaprice\">
                <td>НПЗ</td>
                <td>A-80</td>
                <td>ДT</td>
                <td>А-95</td>
                <td>А-92</td>
            </tr>";
            session_start();
            while ($row = mysqli_fetch_array($otvet)) {
                $_SESSION['idEdit'] = $row['id'];
                echo "<tr>";
                echo "<td><input type='text' value='" . $row['npz'] . "' name='npz'></td>";
                echo "<td><input type='text' value='" . $row['a80'] . "' name='a80'></td>";
                echo "<td><input type='text' value='" . $row['dt'] . "' name='dt'></td>";
                echo "<td><input type='text' value='" . $row['a92'] . "' name='a92'></td>";
                echo "<td><input type='text' value='" . $row['a95'] . "' name='a95'></td>";
                echo "</tr>";


            }
            echo "</table><input type='submit' value='Ok'></form>";
        }
    }

} else {

    echo "<form action=\"adminca.php\" method=\"post\">
<table class=\"tab\" cellspacing=\"0\">
    <tr class=\"strokaprice\">
        <td align=\"center\" rowspan=\"2\">НПЗ</td>
        <td colspan=\"4\"><h4>цена в гривнях за литр</h4>
            <h4>10.08.17</h4>
        </td>
    </tr>
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
                                <td class=\"pri\"><input type='submit' name='edit' value='edit'></td>
                                <td class=\"pri\"><input type='submit' name='del' value='del'></td>
                            </tr>";
            } else {
                $strCvet = 0;
                echo "<tr class=\"strokaprice\">";
                echo "  <td class=\"NPZ\">" . $row['npz'] . "</td>
                                <td class=\"pri\">" . $row['a80'] . "</td>
                                <td class=\"pri\">" . $row['dt'] . "</td>
                                <td class=\"pri\">" . $row['a95'] . "</td>
                                <td class=\"pri\">" . $row['a92'] . "</td>
                         <td class=\"pri\"><input type='submit' name='edit' value='edit'></td>
                                <td class=\"pri\"><input type='submit' name='del' value='del'></td>
                            </tr>";
            }

        }
    }
    echo "</table>
</form>";
}
?>

</body>
</html>
