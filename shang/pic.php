<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/16
 * Time: 13:40
 */
header ("Content-Type:text/html;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");
$pic=$_POST['pic'];
$name=$_POST['name'];
$timer=$_POST['time'];
$link = mysqli_connect("www.danthology.cn","cyez","123456","cyez");
mysqli_query($link,"insert into weChat(w_name,time,pic)values ('$name','$timer','$pic')");
mysqli_close($link);
?>