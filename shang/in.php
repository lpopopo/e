<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/15
 * Time: 18:17
 */
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");
header('Content-type: text/html;charset=utf-8');
header("Access-Control-Allow-Methods GET,POST,OPTIONS");
$text=$_POST['text'];
$timer=$_POST['time'];
$name=$_POST['name'];
$link = mysqli_connect("www.danthology.cn","cyez","123456","cyez");
mysqli_query($link,"insert into weChat(w_name,time ,message) values ('$name','$timer','$text')");
$sql="SELECT message FROM weChat WHERE time=$timer";
$res= mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($res);
var_dump($row);
mysqli_close($link);

?>