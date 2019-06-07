<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/15
 * Time: 10:44
 */

header ("Content-Type:text/html;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");
$phone=$_POST['phone'];
$name=$_POST['name'];
$link = mysqli_connect("www.danthology.cn","cyez","123456","cyez");
$res=mysqli_query($link,"select * from b where phone=$phone");
$to=mysqli_fetch_assoc($res);
if (!$to){
    mysqli_query($link,"insert into b(w_name,phone)values ('$name','$phone')");
    $row=array(
        'w_name'=>$name,
        'phone'=>$phone,
    );
    $row=josn_encode($row);
    echo ($row);
}else{
    $sql="SELECT  rel_name,sex,home,hobbit from b where phone='$phone'";
    $res=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($res);
    $row=josn_encode($row);
    echo ($row);
}
mysqli_close($link);



?>