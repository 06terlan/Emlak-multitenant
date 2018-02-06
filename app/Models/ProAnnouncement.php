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
                return "<button style='width:105px;' type='button' class='btn btn-info' >İcarədə deyil </button>";
            case 2:
                return "<button style='width:105px;' type='button' class='btn btn-success' >Satılmayıb </button>";
            case 3:
                return "<button style='width:105px;' type='button' class='btn btn-warning' >İcarədə </button>";
            case 4:
                return "<button style='width:105px;' type='button' class='btn btn-primary' >Satılıb </button>";
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
        return $this->belongsTo(MskMetro::class);
    }
}

