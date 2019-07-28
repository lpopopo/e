<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/19
 * Time: 14:45
 */
function err_handler($err_level , $err_message , $file , $line){
    switch($err_level){
        case E_NOTICE:
        case E_USER_NOTICE:
            $err_type = 'Notice';break;
        case E_WARNING:
        case E_USER_WARNING:
            $err_type = 'Warning';break;
        case E_ERROR:
        case E_USER_ERROR :
            $err_type = 'Error';break;
        default :
            $err_type = 'Unknown';break;
    }

    echo $err_type;


}

set_error_handler('err_handler');

?>