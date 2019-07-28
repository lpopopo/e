<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/14
 * Time: 12:53
 */

header ("Content-Type:text/html;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");

$userName = $_POST['userName'];
$join = $_POST['joinGame'];
$link = mysqli_connect('127.0.0.1' ,'root' , '123456' , 'ls');
$sql = "insert into a( user , game )values('$userName' ,'$join' )";
mysqli_select_db($link,"ls");
mysqli_query($link , $sql);
mysqli_close($link);
echo 1;

?>