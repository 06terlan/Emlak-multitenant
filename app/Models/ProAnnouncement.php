<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProAnnouncement extends Model
{
    //not deleted datas
    public static function realAnnouncements()
    {
        return self::where('deleted' , 0)->orderBy('id', 'desc');
    }

    //author name
    public function author()
    {
        return $this->hasOne('App\User', 'id', 'userId');
    }

    //today
    /*public static function todayAnnouncements()
    {
        return self::where('date' , Date::d(null, "Y-m-d"))->orderBy('id', 'desc');
    }

    public static function isLinkExist($link)
    {
        return self::where('link', '=', $link)->count() > 0 ? true : false;
    }

    public function getShortContent()
    {
        return mb_strimwidth($this->content, 0, 100, "...");
    }

    public function getAnnouncementType()
    {
        return isset(MyClass::$announcementTypes[$this->type]) ? MyClass::$announcementTypes[$this->type] : "-";
    }*/
}
