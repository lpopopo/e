<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/15
 * Time: 15:18
 */

//header ("Content-Type:text/html;charset:utf-8");

header('Access-Control-Allow-Origin:*');


header('Access-Control-Allow-Methods:*');

header('Access-Control-Allow-Headers:x-requested-with,content-type');
$ti=$_POST['t'];
$send = json_encode($ti);
echo  $send;
/*$link = mysqli_connect("www.danthology.cn","cyez","123456","cyez");
if ($link)
{
    echo 1;
}

$re= mysqli_query($link,"insert into pic(w_name,time)values ('1','2')");
if ($re===TRUE){
    echo 't';
}else{
    echo 0;
}

$a = mysqli_query($link,"SELECT  time from pic where w_name='1'");
$b=implode("",mysqli_fetch_array($a));
echo  $b;
mysqli_close($link);*/

//echo( 0);
/*$a=array(
    "a"=>"",
    "b"=>"b"
);
$b=[$a,1];
$c=json_encode($b);
echo($c);*/
/*$name=1;
$name1=2;
$sex=9;
$phone=4;
$link = mysqli_connect("www.danthology.cn","cyez","123456","cyez");
$sql="insert into weChat(w_name,time ,message)values ('$name','$phone','$sex')";
$a=mysqli_query($link,$sql);
if ($a===TRUE){
    echo 1;
}
$sql="SELECT message FROM weChat WHERE time=$phone";
$res= mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($res);
var_dump($row);
var_dump($row['message']);
mysqli_close($link);*/

/*$arr=array(
    'ti'=>'1'
);
var_dump($arr['ti']);*/

/*$sql="DELETE  FROM b WHERE w_name='1'";
mysqli_query($link,$sql);
$sql="SELECT * FROM b";
$res=mysqli_query($link,$sql);
while ($row=mysqli_fetch_assoc($res)){
    var_dump($row);
}*/
/*$sql="SELECT * FROM b ";
$res=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($res);
    echo  $row;*/
/*$name=1;
$phone=2;
mysqli_query($link,"insert into b(w_name,phone)values ($name,$phone)");
$sql="SELECT * FROM b";
$res=mysqli_query($link,$sql);
while ($row=mysqli_fetch_assoc($res)) {
    var_dump($row);
}*/
/*$phone=110;
$name='yiyi';
$res=mysqli_query($link,"select * from b where phone=$phone");
$to=mysqli_fetch_assoc($res);
if (!$to){
    mysqli_query($link,"insert into b(w_name,phone)values ('$name','$phone')");
    $row=array(
        'w_name'=>$name,
        'phone'=>$phone,
    );
    $row=json_encode($row);
    echo ($row);
}*/
/*$sql="SELECT * FROM b  WHERE ....";
$res=mysqli_query($link,$sql);
while ($row=mysqli_fetch_assoc($res)) {
    var_dump($row);
}*/

/*$link = mysqli_connect('127.0.0.1' ,'root' , '123456' , 'test');
if ($link)
{
    echo 1;
}

$sql = "CREATE TABLE a(
        name  VARCHAR (32),
        age   VARCHAR (32)
)";

mysqli_select_db($link,"test");
$re = mysqli_query($link , $sql);
if ($re === TRUE){
    echo 't';
}else{
    echo 0;
}

mysqli_close($link);*/


?>