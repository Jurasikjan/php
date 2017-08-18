<?php
/**
 * Created by PhpStorm.
 * User: Юра
 * Date: 18.08.2017
 * Time: 9:32
 */

class Publication{


    public $id;
    public $title;
    public $date;
    public $short_content;
    public $content;
    public $preview;
    public $author_name;
    public $type;

    function __construct($rows)
    {
        $this->id=$rows['id'];
        $this->title=$rows['title'];
        $this->date=$rows['date'];
        $this->short_content=$rows['short_content'];
        $this->content=$rows['content'];
        $this->preview=$rows['preview'];
        $this->author_name=$rows['author_name'];
        $this->type=$rows['type'];
    }
}

class NewsPublication extends Publication{

    public function printItem(){
        echo '<br>News '.$this->title;
        echo '<br>'.$this->date;
    }
}

class ArticlePublication extends Publication{

    public function printItem(){
        echo '<br>Article '.$this->title;
        echo '<br>'.$this->date;
    }
}

class PhotoReportPublication extends Publication{

    public function printItem(){
        echo '<br>PhotoReport '.$this->title;
        echo '<br>'.$this->date;
    }
}