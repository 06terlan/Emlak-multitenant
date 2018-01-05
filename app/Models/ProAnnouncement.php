<?php



namespace App\Models;



use App\Library\MyClass;

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

}

