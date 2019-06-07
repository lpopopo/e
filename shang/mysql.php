<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/15
 * Time: 17:52
 */

$link = mysqli_connect("www.danthology.cn","cyez","123456","cyez");
$sql = "CREATE TABLE b(
     w_name   VARCHAR(32),
     rel_name  VARCHAR(32),
     sex       VARCHAR(32),
     phone      VARCHAR(32),
     home      VARCHAR(32),
     hobbit      VARCHAR(32),
     head        mediumblob

)";
mysqli_select_db($link,"cyez");
$re= mysqli_query($link ,$sql);
if ($re===TRUE){
    echo 1;
}else{
    echo 0;
}


/*$sql="CREATE TABLE we(
      w_name   VARCHAR(32),
      time     VARCHAR(32),
      message  text,
      pic      mediumblob,
      head      mediumblob
)";

mysqli_select_db($link ,"cyez");
$re=mysqli_query($link ,$sql);
if ($re===TRUE){
    echo 1;
}else{
    echo 0;
}*/

/*$re=$sql="CREATE TABLE pic(
      w_name   VARCHAR(32),
      time     VARCHAR(32),
      pic      mediumblob

)";
if ($re===TRUE){
    echo 1;
}else{
    echo 0;
}
mysqli_select_db($link,"cyez");
mysqli_query($link ,"$sql");*/

mysqli_close($link);

?>