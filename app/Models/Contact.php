<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;

    public static function NotRead()
    {
    	return self::where('read' , 0)->where('deleted',0)->orderBy('created_at', 'desc');
    }

    //not deleted datas
    public static function realContact()
    {
    	return self::where('deleted' , 0)->orderBy('created_at', 'desc');
    }
}
