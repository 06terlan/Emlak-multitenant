<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MskType extends Model
{
    private $availableModules = false;

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
}
