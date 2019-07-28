<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/22
 * Time: 18:00
 */

header ("Content-Type:text/json;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");

require ('../studyProcess/myku/db.php');

$peopleCount = 5;

function getPeople($peopleCount , $option)
{
    $isGo = $option->select(["id"] , ["flag" , "=" , "0"]);
    if (!$isGo){
        var_dump(['msg'=>"人数已抽奖完成" , "status" => "0"]);
        return ;
    }else{
        $id = rand(0 , $peopleCount-1);
        $flag = $option->select(["flag"] , ["id" , "=" , "$id"]);
        if ($flag[0] == 0){
            $name = $option->select(["name"] , ["id" , "=" , "$id"]);
            var_dump(["msg"=>["name" => $name] , "status" => "1"]);
            $option->update(["flag"=>"1"] , ["id" ,"=" , "$id"]);
            return;
        }else{
            getPeople($peopleCount , $option);
        }
    }
}
$option = new DB('127.0.0.1' , 'root' , '123456' , 'ls' , "price" );

getPeople($peopleCount , $option);








?>