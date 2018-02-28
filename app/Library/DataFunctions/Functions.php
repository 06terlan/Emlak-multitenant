<?php
/**
 * Created by PhpStorm.
 * User: Terlan-Pc
 * Date: 2/28/2018
 * Time: 11:57 PM
 */

namespace App\Library\DataFunctions;


use App\Library\MyHelper;
use App\Models\MskCity;

class Functions
{
    public static function tapazGetCity($tt, $where)
    {
        $cityName     = @$tt->findEr($where, [['.property', 0], ['.property-value', 0]])->plaintext;
        if($cityName == null) return null;

        $city = MskCity::where('pure_name', MyHelper::pureString($cityName))->first();
        return ['plaintext' => ( $city ? $city->id : 0 ) ];
    }
}