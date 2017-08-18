<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 18.08.2017
 * Time: 14:19
 */

class Pole {
    private $arr;
    private $width;
    private $hedth;

    public function __construct($width,$heidth)
    {
        $this->width=$width;
        $this->hedth=$heidth;

        for ($i=0;$i<$width;$i++)
        {
            $mas=array();
            for ($j=0;$j<$heidth;$j++)
            {
               $mas[]=0;
            }
            $this->arr[]=$mas;
        }

    }
    public function printPole(){
        for ($i=0;$i<count($this->arr);$i++)
        {
            for ($j=0;$j<count($this->arr[$i]);$j++)
            {
               echo $this->arr[$i][$j];
            }
            echo '<br>';

        }

    }

}