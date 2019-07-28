<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/14
 * Time: 15:59
 */

header ("Content-Type:text/html;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");

$name = $_POST['name'];
//$name = 'LS';
$t=time();
$time = date("Y-m-d",$t);
$time = explode('-',$time);
$month = $time[1];
$date = $time[2];
$link = mysqli_connect('127.0.0.1' ,'root' , '123456' , 'ls');

$res=mysqli_query($link,"SELECT * from game");
$n=0;
$arr=array();
$now = 0;
while ( $row=mysqli_fetch_assoc($res)){
    if ($month > $row['month']){
        $arr[$n] = $row;
        $n++;
    }else if($month = $row['month'] ){
        if ($date > $row['date']){
            $arr[$n] = $row;
            $n++;
        }
    }


}


$s = " SELECT *  FROM a WHERE user='$name'";
$res = mysqli_query($link , $s);
$n = 0;
$back = array();
while ($row = mysqli_fetch_assoc($res)){
    $back[$n] = $row;
    $n++;
}

//var_dump($back);
for($j = 0 ; $j < count($arr) ; $j++){
    for ($g = 0 ; $g < count($back) ; $g++){
        if ($arr[$j]['name'] == $back[$g]['game']){
            $arr[$j]['a'] = '1';
        }
    }
}

//var_dump($arr);
$now =0;$j = 0;
$length = count($arr);
$a = array();
$b = array();
while($now < $length ){
    $g = 0;
    for ($now ; $now  - $j*6 < 6  && $now < $length; $now++){
        $a[$g] = $arr[$now];
        $g++;
    }
    $b[$j] = $a;
    $j++;
}

//var_dump($b[0][0]['a']);
$data = json_encode($b);
echo $data;

mysqli_close($link);

?>