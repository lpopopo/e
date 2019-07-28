<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/19
 * Time: 13:43
 */

require ('../studyProcess/myku/db.php');

$data =[
      '刘帅',
    '陈福',
    '张三',
    '李四',
    '王五'
];

$option = new DB('127.0.0.1' , 'root' , '123456' , 'ls' , "price" );

for ($i = 0 ; $i < count($data) ; $i++){
    $option->InsertIn(["name"=>"'$data[$i]'"  ,"id"=>"'$i'" , "password"=> "'123456'","flag" => "'0'"] );
}




?>