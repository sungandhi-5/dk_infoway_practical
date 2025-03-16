<?php

namespace App\Lib;
class General
{

    static function error_res($msg = "", $args = array())
    {
        $msg = $msg == "" ? "error" : $msg;
        $json = array('flag' => 0, 'msg' => $msg);
        return $json;
    }

    static function success_res($msg = "", $args = array())
    {
        $msg = $msg == "" ? "success" : $msg;
        $json = array('flag' => 1, 'msg' => $msg,'data'=>$args);
        return $json;
    }

    static function validation_error_res($msg = "", $args = array())
    {
        $msg = $msg == "" ? "validation error" : $msg;
        $json = array('flag' => 2, 'msg' => $msg);
        return $json;
    }

    static function info_res($msg = "", $args = array())
    {
        $msg = $msg == "" ? "information" : $msg;
        $json = array('flag' => 3, 'msg' => $msg);
        return $json;
    }
}
