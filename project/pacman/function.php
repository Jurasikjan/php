<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 18.08.2017
 * Time: 21:20
 */
function GetColorArray($img){
    //$im = ImgCreate($img);
    $width = imagesx($img);
    $height = imagesy($img);
    $data = array();
    for($y=0; $y<$height; $y++)
    {
        for($x=0; $x<$width; $x++)
        {
            $rgb = imagecolorat($img, $x, $y);
            $data[$x][$y] = imagecolorsforindex($img, $rgb);
        }

    }
    return $data;
}


function ImgCreate($img){ //Автоматически определит тип картинки
    $tm = explode(".", $img);
    $ext = strtolower($tm[sizeof($tm)-1]);
    $root = false;
    switch($ext){
        case 'jpg':
        case 'jpeg':
            $root = imagecreatefromjpeg($img);
            break;
        case 'gif':
            $root = imagecreatefromgif($img);
            break;
        case 'png':
            print_r(imagecreatefrompng($img));
            $root = imagecreatefrompng($img);

            break;
        case 'bmp':
            $root = imagecreatefrombmp($img);
            break;
        default:
            $root = imagecreatefromstring($img);
    }

    if(!imageistruecolor($root)){
        echo '<br>';
        var_dump($root);
        $x = imagesx($root);
        $y = imagesy($root);
        $temp = imagecreatetruecolor($x, $y);
        imagecopy($temp, $root, 0, 0, 0, 0, $x, $y);
        imagedestroy($root);
        $root = $temp;
        unset($temp);
    }
    return $root;
}

echo '<img src="./pole.png">';
$colors = GetColorArray('pole.png');
var_export($colors);
