<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/13
 * Time: 22:57
 */

header ("Content-Type:text/html;charset:utf-8");
header ("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:x-requested-with,content-type");

$img = $_POST['img'];
$imgName = $_POST['imgName'];
$gameYear = $_POST['gameYear'];
$gameMonth = $_POST['gameMonth'];
$gameDate = $_POST['gameDate'];
$gameName = $_POST['gameName'];
$gameMessage = $_POST['gameMessage'];

function picChange($pic , $imgName)
{
    $t=time();
    $name = $imgName;
    $name = explode('.' , $name);
    $newname = $name[0];
    $geshi = $name[2];
    $relname = $newname.$t.'.'.$geshi;
    if (strstr($pic, ",")) {
        $pic = explode(',', $pic);
        $image = $pic[1];
    }
    $path = 'C:\Program Files (x86)\Sublime Text3\HTML\work\e_tong\images';
    if (!is_dir($path)) { //判断目录是否存在 不存在就创建
        mkdir($path, 0777, true);
    }
    $imageSrc = $path . "/" . $relname;
    $r = file_put_contents($imageSrc, base64_decode($image));
    if ($r) {return $relname;}
    else {return 0;}
}

$res =  picChange($img , $imgName);

    $link = mysqli_connect('127.0.0.1' ,'root' , '123456' , 'ls');
    $sql = "insert into game(name , img , message , year , month , date )values('$gameName' , '$res' , '$gameMessage' ,'$gameYear','$gameMonth','$gameDate')";
    mysqli_select_db($link,"ls");
mysqli_query($link , $sql);
mysqli_close($link);

echo 1;

?>