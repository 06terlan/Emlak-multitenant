<?php

namespace App\Models;

use App\Library\MyHelper;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public static function realData()
    {
        return MyHelper::addTenantFilter( self::orderBy('id', 'DESC'), true );
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
