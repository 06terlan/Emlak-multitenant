<?php
namespace App\Library;


use App\Models\MskMakler;
use Illuminate\Support\Facades\DB;

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

    /*
    * pure mob number
    */
    public static function pureNumber($number)
    {
        return str_replace(array(' ','(',')','-','_'), '', $number);
    }

    /*
    * get makler
    */
    public static function getMakler($number)
    {
        $makler = MskMakler::where('pure_mobnom', self::pureNumber($number))->first();

        if($makler) return "<b style='border-bottom: 1px dotted #ff0000b3;color: #ff0000b3;' data-toggle='tooltip' data-original-title='Makler'> <i class='fa fa-child'></i> " . $makler->fullname . "</b>";
        return "";
    }
}