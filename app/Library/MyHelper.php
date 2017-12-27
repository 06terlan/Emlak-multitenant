<?php
namespace App\Library;


class MyHelper
{
    /*
    * create case when query
    */
    public static function createCase(array $arr, $column)
    {
        $ii = "";
        foreach($arr as $key => $val)
            if(is_integer($key)) $ii .= " WHEN $column=$key THEN '$val'";
            else $ii .= " WHEN $column='$key' THEN '$val'";

        return "(CASE $ii END)";
    }
}