<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/14
 * Time: 0:45
 */

header ("Content-Type:text/html;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");

$name = $_POST['name'];
$passworld = $_POST['password'];


$link = mysqli_connect('127.0.0.1' ,'root' , '123456' , 'test');
$sql = "SELECT password FROM user WHERE id = $name";
mysqli_select_db($link,"test");
$res = mysqli_query($link , $sql);
if ($res) {
    $comeout = mysqli_fetch_array($res)[0];
    if ($comeout != $passworld) {
        echo 1;
    } else {
        $sql = "SELECT name FROM user WHERE id=$name";
        $res = mysqli_query($link, $sql);
        $comeout = mysqli_fetch_array($res)[0];
        $data = json_encode($comeout);
        echo $data;
    }
}else{
    echo 0;
}


mysqli_close($link);
?>