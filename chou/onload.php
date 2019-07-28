<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/19
 * Time: 13:26
 */

header ("Content-Type:text/json;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");

require ('../studyProcess/myku/db.php');
require ('../studyProcess/myku/err.php');

$name = $_POST['name'];
$password = $_POST['password'];

$option = new DB('127.0.0.1' , 'root' , '123456' , 'ls' , "price" );

$correct =  $base->select(["password"] , ["name" ,"=","'$name'"]);

if ($correct) {
    if ($password == $correct[0]) {
        var_dump(['msg'=>'验证成功后','status'=>'1']);
    } else {
        var_dump(['msg'=>'密码或用户名输入错误' , 'status' =>'0']);
    }
}else{
    var_dump(['msg'=>'无法找到用户','status'=>'0']);
}



?>