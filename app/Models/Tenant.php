<?php

namespace App\Models;

use App\Library\MyClass;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    //not deleted users
    public static function realTenants()
    {
        return self::where('deleted' , 0)->orderBy('id', 'desc');
    }

    public function getType()
    {
        return isset(MyClass::$companyTypes[$this->type]) ? MyClass::$companyTypes[$this->type] : "-";
    }
}
