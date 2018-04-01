<?php

namespace App\Models;

use App\Library\Date;
use Illuminate\Database\Eloquent\Model;
use App\Library\MyClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Announcement extends Model
{
    //not deleted datas
    public static function realAnnouncements($order = true)
    {
        $tenant_id = Auth::user()->tenant_id;
        $query = self::where(DB::raw("(SELECT 1 FROM deleted_announcements WHERE deleted_announcements.announcement_id=announcements.id AND deleted_announcements.tenant_id=$tenant_id limit 1)"), null);

        if(!$order) return $query;
    	return $query->orderBy('id', 'desc');
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

    public function getAnnouncementType2()
    {
        return isset(MyClass::$buldingSecondType[$this->type2]) ? MyClass::$buldingSecondType[$this->type2] : "-";
    }

    public function getBuldingType()
    {
        return isset(MyClass::$buldingType[$this->buldingType]) ? MyClass::$buldingType[$this->buldingType] : "-";
    }

    public function numbers()
    {
        return $this->hasMany(Number::class);
    }

    public function deleted_tenants()
    {
        return $this->belongsToMany(Tenant::class, 'deleted_announcements');
    }

    public function city()
    {
        return $this->belongsTo(MskCity::class);
    }

    public function metro()
    {
        return isset(MyClass::$metros[$this->metro_id]) ? MyClass::$metros[$this->metro_id][0] : "-";
    }

    public function pictures()
    {
        return $this->hasMany(Photo::class);
    }
}
