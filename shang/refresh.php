<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/16
 * Time: 10:13
 */
header ("Content-Type:text/html;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");
$ti=$_POST['t'];
$link = mysqli_connect("www.danthology.cn","cyez","123456","cyez");
$res=mysqli_query($link,"SELECT * from weChat WHERE ($ti-time)<=1000");
$n=0;$arr=array();
while ( $row=mysqli_fetch_assoc($res)){
        $arr[$n] = $row;
        $n++;

}
$arr=json_encode( $arr);
echo  ($arr);
mysqli_close($link);

?>