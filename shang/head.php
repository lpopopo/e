<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/28
 * Time: 14:52
 */
header ("Content-Type:text/html;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");
$pic=$_POST['pic'];
$phone=$_POST['phone'];
$link = mysqli_connect("www.danthology.cn","cyez","123456","cyez");
mysqli_query($link,"UPDATE b SET head='$pic' WHERE phone='$phone'");
mysqli_close($link);
?>