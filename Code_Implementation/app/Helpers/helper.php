<?php

use \Carbon\Carbon;

if (!function_exists('informArray')) {
    function informArray($op)
    {
        $array = [];
        $handleArray = explode(',', trim($op));
        foreach ($handleArray as $key => $value) {
            $array[$value] = trim($value);
        }
        return $array;
    }
}

if (!function_exists('clcPer')) {
    function clcPer($total, $value)
    {
       if($total == 0 || $value == 0){
        return 0;
       }
       return (($total/100) * $value);
    }
}

if (!function_exists('isImg')) {
    function isImg($file)
    {  
        $array = explode('.', $file);
        $extension = strtolower(end($array));   
        if(in_array($extension, ['png', 'jpg', 'jpeg', 'bmp', 'gif'])){
            return true;
        }
        return false;
    }
}

if (!function_exists('random_color')) {
    function random_color()
    {
        // Generate a random hexadecimal color code
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
}

if (!function_exists('getDiscountValue')) {
    function getDiscountValue($discount = 0, $total = 0)
    {
        if($discount == 0 || $total == 0){
            return 0;
        }
        return round(($discount / 100) * $total, 2);
    }
}