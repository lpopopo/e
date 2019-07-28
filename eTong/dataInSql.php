<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/13
 * Time: 14:50
 */

$link = mysqli_connect('127.0.0.1' ,'root' , '123456' , 'ls');
/*if(!$link){
    echo 'error';
    return ;
}*/

/*$sql = "CREATE TABLE user(
        name  VARCHAR (32),
        id    int(20),
        password  VARCHAR (32)
)";*/

$sql = "CREATE TABLE a(
        user  VARCHAR (32),
        game   VARCHAR (32)
)";
/*$sql = "CREATE TABLE in(
       user  VARCHAR (32),
       game  VARCHAR (32)
)";*/

/*$sql = "CREATE TABLE join(
      name   VARCHAR (32),
      game  VARCHAR (32)
)";*/

mysqli_select_db($link,"ls");
mysqli_query($link , $sql);
mysqli_close($link);

?>