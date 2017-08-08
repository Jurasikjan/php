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
$name[0]="Alex";
$name[1]="Jef";
$name[2]="Yary";

echo "\$name[0]=\"Alex\";
\$name[1]=\"Jef\";
\$name[2]=\"Yary\";
<br> или Авто добавления в массив<br> \$name[]=\"Alex\";
\$name[]=\"Jef\";
\$name[]=\"Yary\";<br>";

echo "$name[1]<br/> count(\$name)- длинна массива <br>";

for ($i=0;$i< count($name);$i++)
{
   echo $name[$i]."<br/>";
}
echo "\$name[\"Ivan\"]=\"Alex\";
\$name[\"Will\"]=\"Jef\";
\$name[\"Spec\"]=\"Yary\"; индекс массива может быть строкой! <br>";

$name1["Ivan"]="Alex";
$name1["Will"]="Jef";
$name1["Spec"]="Yary";

foreach ($name1 as $k => $v) {
    echo $k . " = " . $v . "<br>";
}

echo "define('masiv',[\"ivanov\" => [\"name\" => \"ivan\",\"born\" => \"12-03-1990\"]] массив константа<br>";
define('masiv',
        ["ivanov" => ["name" => "ivan","born" => "12-03-1990"]]
);
echo masiv["ivanov"]["name"]."<br>";

$first=["first","sec"];
$second=["dog","cat","hhuman"];
$all= $first + $second;

echo "var_dump(\$all); иинфо об массиве<br>";

var_dump($all);
echo "<br>\$first=[\"first\",\"sec\"];
\$second=[\"dog\",\"cat\",\"hhuman\"];<br>";
echo "\$all= \$first + \$second; складывает массив индекс втророго пропускаются<br>";
foreach ($all as $k => $v)
{
    echo $k." ".$v."<br>";
}


?>


</body>
</html>