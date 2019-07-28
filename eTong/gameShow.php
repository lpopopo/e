<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/14
 * Time: 7:59
 */
header ("Content-Type:text/json;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");

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


$data = json_encode($b);
echo $data;

mysqli_close($link);

?>