<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/15
 * Time: 13:02
 */

$i=0;
$baseName = ['name'=>" 'name' ", 'id' =>'id'];
$data = ['name'=>'yy' , 'id'=> '1'];
$form = 'user';
$name = 'name';
/*$link = mysqli_connect('127.0.0.1' ,'root' , '123456' , 'test');
$sql = " INSERT INTO  user (". $baseName{'name'}." ) VALUES  ( 'yy ' ) ";
echo $sql;*/
//mysqli_select_db($link,"test");

//$sql = "SHOW FULL COLUMNS FROM ".$form."";

//$res = mysqli_query($link , $sql);

/*$i = 0;
while($row = mysqli_fetch_array($res))
{
    $arr[$i] =  $row[0];
    $i++;
}*/

echo "yiyi{$baseName['name']}";



?>