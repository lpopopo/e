<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/14
 * Time: 13:20
 */

header ("Content-Type:text/html;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");

$name = $_POST['userName'];
//$name = 'LS';
$link = mysqli_connect('127.0.0.1' ,'root' , '123456' , 'ls');
$sql = " SELECT *  FROM a WHERE user='$name'";
$res = mysqli_query($link , $sql);
$n = 0;
$arr = array();
$back = array();
while ($row = mysqli_fetch_assoc($res)){
    $arr[$n] = $row;
    $n++;
}

for ($i = 0 ; $i < count($arr) ; $i++){
    $gameName[$i] = $arr[$i]['game'];
}

for ($i = 0;$i < count($gameName) ; $i++){
    $sql = "SELECT *  FROM game WHERE name='$gameName[$i]'";
    $res = mysqli_query($link , $sql);
    while($row = mysqli_fetch_assoc($res)){
        $row['a'] = 1;
        $back[$i] = $row;
    }
}

$now =0;$j = 0;
$length = count($back);
$a = array();
$b = array();
while($now < $length ){
    $g = 0;
    for ($now ; $now  - $j*6 < 6  && $now < $length; $now++){
        $a[$g] = $back[$now];
        $g++;
    }
    $b[$j] = $a;
    $j++;
}


$data = json_encode($b);
echo $data;

mysqli_close($link);

?>