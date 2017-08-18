<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 18.08.2017
 * Time: 14:19
 */

class Pole {
    public $arr;

    public function __construct()
    {
        for ($i=0;$i<10;$i++)
        {
            $mas=array();
            for ($j=0;$j<10;$j++)
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