<?php



namespace App\Models;



use App\Library\Date;
use App\Library\MyClass;

use App\Library\MyHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ProAnnouncement extends Model
{
    //not deleted datas
    public static function realAnnouncements($order = true)
    {
        if(!$order) return MyHelper::addTenantFilter( self::where('deleted' , 0) );

        return MyHelper::addTenantFilter( self::where('deleted' , 0)->orderBy('id', 'desc') );
    }

    //today
    public static function todayAnnouncements($order = true)
    {
        return  self::realAnnouncements($order)->where(DB::raw('CAST(created_at as DATE)') , Date::d(null, "Y-m-d"));
    }

    public function getStatus()
    {
        switch ($this->status)
        {
            case 1:
                return "<span style='color: yellowgreen; font-size:12px' class='text-right'>İcarədə deyil </span> ";
            case 2:
                return "<span style='color: green' class='text-right'>Satılmayıb </span>";
            case 3:
                return "<span style='color: #ff6600' class='text-right'>İcarədə </span>";
            case 4:
                return "<span style='color: #9c27b0' class='text-right'>Satılıb </span>";
        }
    }



    //author name

    public function author()
    {
        return $this->hasOne('App\User', 'id', 'userId');
    }



    public function getShortContent()

    {

        return mb_strimwidth($this->content, 0, 100, "...");

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



    public function getDocumentType()
    {
        return isset(MyClass::$documentTypes[$this->documentType]) ? MyClass::$documentTypes[$this->documentType] : "-";
    }


    public function getRepairing()
    {
        return isset(MyClass::$repairingTypes[$this->repairing]) ? MyClass::$repairingTypes[$this->repairing] : "-";
    }

    public function clearPictures()
    {
        foreach ($this->pictures as $picture)
        {
            $picture->delete();
        }
    }

    public function numbers()
    {
        return $this->hasMany(ProNumber::class);
    }

    public function getLocations()
    {
        return explode(",", $this->locations) > 1 ? explode(",", $this->locations) : ['0', '0'];
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function metro()
    {
        return isset(MyClass::$metros[$this->metro_id]) ? MyClass::$metros[$this->metro_id][0] : "-";
    }

    public function city()
    {
        return isset(MyClass::$city[$this->city_id]) ? MyClass::$city[$this->city_id][0] : "-";
    }

    public function sight()
    {
        return isset(MyClass::$sight[$this->sight_id]) ? MyClass::$sight[$this->sight_id][0] : "-";
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
}

