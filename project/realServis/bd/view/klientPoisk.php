<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 16.11.2017
 * Time: 13:24
 */
include_once '..\model\human.php';

$human = new Human();

$masSpisik = $human->getAll();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>klientPoisk</title>
</head>
<body>
<a href="../index.php">Back</a><br>

Poisk<input id="SimPoisk" type="text" onkeyup='poisk()'><br>


<form method="post" action="../index.php">
    <select id="spisok" name="klientPoisk" size="10">
        <?php
        foreach ($masSpisik as $hArr => $m) {
            echo " <option id='" . $m['id'] . "'>" . $m['imy'] . "_" . $m['id'] . "</option>";
        }
        ?>
    </select>
    <br>
    <input type="text" name="str" value="<?php echo $_GET['i'];?>" style="width: 0px; height: 0px; border: 0px">
    <input type="submit" value="Ok">
</form>

<script>
    function poisk() {
        var SimPoisk = document.getElementById('SimPoisk').value;
        var objSel = document.getElementById('spisok');
        SimPoisk = SimPoisk.toUpperCase();
        for (var i = 0; i < objSel.options.length; i++) {

            var name = objSel.options[i].value.toUpperCase();
            if (name.indexOf(SimPoisk) == 0 && SimPoisk.length > 0) {
                objSel.options[i].selected = true;
                break;
            }
        }
    }
</script>

<hr>

</body>
</html>
