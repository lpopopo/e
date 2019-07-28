<?php
/*
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/17
 * Time: 22:40
 */

header ("Content-Type:text/json;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");

    $name = $_POST['name'];
    var_dump($name);

?>