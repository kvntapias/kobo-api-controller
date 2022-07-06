<?php 

namespace App\Helpers;


class HlpText{

    public static function trim_underscore($value, $replace = ""){
        return str_replace("_", $replace, $value);
    }

}