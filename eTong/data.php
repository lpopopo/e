<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/13
 * Time: 15:08
 */

$messageArr = [
    [],
    [],
    [],
];
class  data {
     public $name;
     public $img;
     public $message;
     public $year;
     public $month;
     public $date;

}

$backArr = [];

function makeData ($messageArr ,$backArr ){
       for ($i = 0; $i < $messageArr.length ; $i++ ) {
           $in = new data;
           $in->name = $messageArr[$i][0];
           $in->img = $messageArr[$i][1];
           $in->message = $messageArr[$i][2];
           $in->year = $messageArr[$i][3];
           $in->month = $messageArr[$i][4];
           $in->date = $messageArr[$i][5];
           $backArr[$i] = $in;
       }
};


?>