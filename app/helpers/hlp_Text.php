<?php 

namespace App\Helpers;


class hlp_Text{

    public static function trim_underscore($value, $replace = ""){
        return str_replace("_", $replace, $value);
    }

}