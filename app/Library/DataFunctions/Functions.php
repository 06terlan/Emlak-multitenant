<?php
/**
 * Created by PhpStorm.
 * User: Terlan-Pc
 * Date: 2/28/2018
 * Time: 11:57 PM
 */

namespace App\Library\DataFunctions;


use App\Library\MyClass;
use App\Library\MyHelper;
use App\Models\MskCity;

class Functions
{
    # tapaz
    public static function tapazGetCity($tt, $where)
    {
        $cityName     = @$tt->findEr($where, [['.property', 0], ['.property-value', 0]])->plaintext;
        if($cityName == null) return null;

        $city = MskCity::where('pure_name', MyHelper::pureString($cityName))->first();
        return ['plaintext' => ( $city ? $city->id : 0 ) ];
    }

    public static function getMetroTapaz($tt, $where)
    {
        if( $tt->pageData['placeDom'] ){
            foreach (MyClass::$metros as $key => $metro)
                if(preg_match($metro[1], $tt->pageData['placeDom'])) return ['plaintext' => $key];
        }
        if( $tt->pageData['headerDom'] ){
            foreach (MyClass::$metros as $key => $metro)
                if(preg_match($metro[1], $tt->pageData['headerDom'])) return ['plaintext' => $key];
        }
        if( $tt->pageData['contentDom'] ){
            foreach (MyClass::$metros as $key => $metro)
                if(preg_match($metro[1], $tt->pageData['contentDom'])) return ['plaintext' => $key];
        }

        return ['plaintext' => null];
    }

    # vipemlak
    public static function vipemlakGetCity($tt, $where)
    {
        $city = MskCity::where('pure_name', MyHelper::pureString('baki'))->first();
        return ['plaintext' => ( $city ? $city->id : 0 ) ];
    }
}