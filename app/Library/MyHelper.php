<?php
namespace App\Library;


use App\Models\MskMakler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyHelper
{
    private static $maklers = [];

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
    * pure string
    */
    public static function pureString($string)
    {
        return str_replace(['ü','ö','ğ','i','ı','ə','ç','ş',' '], ['u','o','g','i','i','e','c','s',''], mb_strtolower($string));
    }

    /*
    * get makler
    */
    public static function getMakler($number)
    {
        $numb = self::pureNumber($number);

        if( !isset(self::$maklers[$numb]) )
        {
            $makler = MskMakler::where('pure_number', $numb)->first();

            if($makler) self::$maklers[$numb] = "<b style='border-bottom: 1px dotted #ff0000b3;color: #ff0000b3;' data-toggle='tooltip' data-original-title='Makler'> <i class='fa fa-child'></i> " . $makler->fullname . "</b>";
            else self::$maklers[$numb] = "";
        }

        return self::$maklers[$numb];
    }

    /*
    * check eny makler
    */
    public static function isMakler($numberArr)
    {
        foreach ($numberArr as $number)
        {
            if( self::getMakler($number) !== "" ) return true;
        }

        return false;
    }

    /*
    * check role
    */
    /*public static function has_role($role)
    {
        $roles = [];

        switch (Auth::user()->role)
        {
            case MyClass::ADMIN_ROLE:
                $roles = [1, 2];
                break;
            case MyClass::SUPER_ADMIN_ROLE:
                $roles = [1, 2, 3];
                break;
        }

        return in_array($role, $roles) ? true : false;
    }*/

    /*
    * check role
    */
    public static function has_priv($module, $priv)
    {
        if( $priv == MyClass::PRIV_SUPER_ADMIN_CAN_SEE || $priv == MyClass::PRIV_SUPER_ADMIN_CAN_ADD )
        {
            if( Auth::user()->group->super_admin != 1 ) return false;

            if($priv == MyClass::PRIV_SUPER_ADMIN_CAN_SEE) $priv = 2;
            else $priv = 3;
        }

        return Auth::user()->group->getModulePriv($module) >= $priv ? true : false;
    }

    /*
    * add tenant filter
    */
    public static function addTenantFilter($query, $strict = false)
    {
        if( $strict === false && Auth::user()->group->super_admin == 1 ) return $query;
        return $query->where('tenant_id', Auth::user()->tenant_id);
    }
}