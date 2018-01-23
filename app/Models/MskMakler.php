<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MskMakler extends Model
{
    public $timestamps = false;

    public static function realData()
    {
        return self::orderBy('id', 'DESC');
    }
}
