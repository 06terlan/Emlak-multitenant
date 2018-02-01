<?php

namespace App\Models;

use App\Library\Date;
use Illuminate\Database\Eloquent\Model;
use App\Library\MyClass;

class Announcement extends Model
{
    //not deleted datas
    public static function realAnnouncements($order = true)
    {
        if(!$order) return self::where('deleted' , 0);

    	return self::where('deleted' , 0)->orderBy('id', 'desc');
    }

    //today
    public static function todayAnnouncements($order = true)
    {
        return self::realAnnouncements($order)->where('date' , Date::d(null, "Y-m-d"));
    }

    public static function isLinkExist($link)
    {
        return self::where('link', '=', $link)->count() > 0 ? true : false;
    }

    public function getShortContent()
    {
        return mb_strimwidth( strip_tags($this->content), 0, 100, "...");
    }

    public function getAnnouncementType()
    {
        return isset(MyClass::$announcementTypes[$this->type]) ? MyClass::$announcementTypes[$this->type] : "-";
    }

    public function getBuldingType()
    {
        return isset(MyClass::$buldingType[$this->buldingType]) ? MyClass::$buldingType[$this->buldingType] : "-";
    }

    public function numbers()
    {
        return $this->hasMany(Number::class);
    }
}
