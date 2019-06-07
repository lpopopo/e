<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/28
 * Time: 21:24
 */
header ("Content-Type:text/html;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");
$name=iconv('UTF-8','gb2312',$_POST['w_name']);
$name1=iconv('UTF-8','gb2312',$_POST['rel_name']);
$sex=iconv('UTF-8','gb2312',$_POST['sex']);
$phone=iconv('UTF-8','gb2312',$_POST['phone']);
$link = mysqli_connect("www.danthology.cn","cyez","123456","cyez");
$sql="UPDATE a SET w_name=$name,rel_name=$name1,sex=$sex WHERE phone=$phone";
mysqli_query($link ,$sql);
mysqli_close($link);
?>