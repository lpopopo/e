<?php
    function youya($r){
        $n=0;
        $a =$r;
        $b =$r;
        for($x=-$a;$x<=$a;++$x){

            for($y=-$b;$y<=$b;++$y ){
                if($x*$x+$y*$y==$r*$r){
                    ++$n;
                }

            }


        }

    return $n;
}
echo youya(5);





?>