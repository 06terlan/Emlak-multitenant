<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //not deleted datas
    /*public static function realPost()
    {
    	return self::where('deleted' , 0)->orderBy('created_at', 'desc');
    }

    //author name
    public function author()
    {
    	return $this->hasOne('App\User', 'id', 'user_id');
    }*/

    public static function isLinkExist($link)
    {
        return self::where('link', '=', $link)->count() > 0 ? true : false;
    }
}
