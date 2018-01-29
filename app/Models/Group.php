<?php

namespace App\Models;

use App\Library\MyHelper;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    private $availableModules = false;

    public static function realData()
    {
        return MyHelper::addTenantFilter( self::orderBy('id', 'DESC'), true );
    }

    public function getModulePriv($module)
    {
        if( !isset($this->getAvailableModules()[$module]) ) return 1;

        return $this->getAvailableModules()[$module];
    }

    public function getAvailableModules()
    {
        if( $this->available_modules == null ) return [];

        return $this->availableModules ? $this->availableModules : ($this->availableModules = json_decode($this->available_modules, true));
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
