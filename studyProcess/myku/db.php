<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/15
 * Time: 11:52
 */


class  DB{
    private $host;
    private $user;
    private $password;
    private $database;
    private $form;
    private $link;
    private $res;

    function __construct($host , $user , $password , $database , $form)
    {
        if ($host && $user && $password && $database){
            $this->host = $host;
            $this->user = $user;
            $this->password = $password;
            $this->database = $database;
            $this->form = $form;
            $connect = mysqli_connect($host , $user , $password , $database);
            $this->link = $connect;
            //echo "链接成功\n";
        }else{
            throw new Exception('数据库链接失败，数据库参数不全');
            return ;
        }
    }

    public function  InsertIn( $data){
        $this ->Insert( $data);
    }

    public function test($mes){
        switch ($mes){
            case 'host' : echo $this->host;break;
            case  'user': echo $this->user;break;
            case  'password' : echo $this->password;break;
            case  'database' : echo $this->database;break;
            case  'form' : echo  $this->form;break;
            case  'link' : var_dump($this->link);
            default:echo "not found";

        }
    }

    private function sqlMake_a($data)
    {
        $check = $this->getall();
        $arr = array_keys($data);
        $str1 = $arr[0];
        $str2 = $data[$arr[0]];
        $isIn = $this->checkIsInMySQL($arr, $check);
        if ($isIn) {
            for ($i = 1; $i < count($data); $i++) {
                $str1 = $str1 . ',' . $arr[$i];
                $str2 = $str2 . ',' . $data[$arr[$i]];
            }
            $res[0] = $str1;
            $res[1] = $str2;
            return $res;
        }
    }

    private function where($limit){
        if (!($limit == [])) {
            $str = "WHERE {$limit[0]}{$limit[1]}{$limit[2]}";
        }else{
            $str = " ";
        }
        return $str;
    }

    private function sqlMake_b($data , $limit){
        $back = array();
        if ($data[0] == '*'){
            $back[0] = $data[0];
        }else{
            $check  = $this->getall();
            if ($this->checkIsInMySQL($data , $check)){
                $str = "(".$data[0];
                for ($i = 1;$i < count($data) ; $i++){
                    $str = $str.','.$data[$i];
                }
                $str = $str.')';
                $back[0] = $str;
            }
        }
        $back[1] = $this->where($limit);
        return $back;

    }

    private function sqlMakeForUpdate($data , $limit){
        $check = $this->getall();
        $name = array_keys($data);
        if ($this->checkIsInMySQL($name , $check)){
            $str1 = $name[0]."=".$data[$name[0]];
            for ($i=1 ; $i < count($name) ; $i++){
                $str1 = $str1.",".$name[$i].$data[$name[$i]];
            }
            $str2 = $this->where($limit);
            $back = [$str1 , $str2];
            return $back;
        }
    }


    private  function checkIsInMySQL($arr , $check){
        for ($i = 0 ; $i < count($arr) ; $i++){
            if (!(in_array($arr[$i] , $check))) {
                echo  $arr[$i]."未在".$this->form."中找到\n";
                return 0;
            }
        }
        return 1;
    }

    private function getall(){
        $sql = "SHOW FULL COLUMNS FROM ".$this->form."";
        $res = mysqli_query($this->link , $sql);
        $arr = array();
        $i = 0;
        while($row = mysqli_fetch_array($res))
        {
            $arr[$i] =  $row[0];
            $i++;
        }
        return $arr;
    }

    //$base->InsertIn(["name"=>"'wyy'" , "id" => "'11'" , "password"=> "'123456'","user" => "'root'"] );
    private function Insert($data){
        if (is_array($data) ){
            $arr = $this->getall();
            if (count($arr) == count($data)){
                if ($this->link){
                    $str = $this->sqlMake_a($data);
                    $sql = "INSERT INTO $this->form(".$str[0].")VALUES(".$str[1].")";
                   // echo $sql."\n";
                    $outcome = mysqli_query($this->link , $sql);

                    if ($outcome){
                        echo "inset success\n";
                    }else{
                        echo "insert not success\n";
                    }
                }
            }
        }else{
            throw new Exception("参数格式为数组\n");
        }

    }
    public function Delete( $limit){
        if ($this->link){
            $str = $this->where($limit);

            $sql = "DELETE  FROM $this->form {$str}";
           // echo $sql."\n";
            $res = mysqli_query($this->link , $sql);
            if ($res){
                echo "delete success\n";
            }else{
                echo "delete not success\n";
            }

        }else{
            echo "请连接数据库\n";
        }
    }

    //$base->select( ["id"]);
    public function select($data , $limit = []){
           if ($this->link){
               $str = $this->sqlMake_b($data , $limit);
               $sql = "SELECT {$str[0]} FROM $this->form {$str[1]}";
               //echo $sql."\n";
               $res = mysqli_query($this->link , $sql);
               if (!$res){
                   echo '查询失败';
               }else{
                   $i = 0;
                   $arr = array();
                   while($row = mysqli_fetch_array($res))
                   {
                       $arr[$i] =  $row[0];
                       $i++;
                   }
                   return $arr ;
               }
           }else{
               echo "请连接数据库\n";
           }
    }

    //$base->update(["id"=>"011"] , ["name" ,"=" , "'1'"]);
    public function update($data , $limit){
        if ($this->link){
            $str = $this->sqlMakeForUpdate($data , $limit);
            $sql = "UPDATE $this->form SET {$str[0]}  {$str[1]}";
            $res = mysqli_query($this->link , $sql);
            if ($res){
                echo "update success";
            }else{
                echo "update not success";
            }
        }else{
            echo "请连接数据库\n";
        }
    }

}


/*$base = new DB('127.0.0.1' , 'root' , '123456' , 'test' , "user" );
//$base->InsertIn(["name"=>"'wyy'" , "id" => "'11'" , "password"=> "'123456'","user" => "'root'"] );
//$base->select( ["id"]);
$base->update(["id"=>"011"] , ["name" ,"=" , "'1'"]);*/

?>

