<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/28
 * Time: 15:42
 */
header ("Content-Type:text/html;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");
$phone=$_POST['phone'];
$link = mysqli_connect("www.danthology.cn","cyez","123456","cyez");
$sql = "SELECT head FROM b WHERE phone=$phone";
$result=mysqli_query($link,$sql);
$data= mysqli_fetch_assoc($result);
$data=json_encode($data);
echo ($data);
mysqli_free_result($result);
mysqli_close($link);

?>