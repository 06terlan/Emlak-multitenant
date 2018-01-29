<?php

namespace App;

use App\Library\MyHelper;
use App\Models\Group;
use App\Models\Tenant;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Library\MyClass;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'login' , 'thumb' , 'deleted'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'login'
    ];

    //not deleted users
    public static function realUsers()
    {
        return MyHelper::addTenantFilter( self::where('deleted' , 0)->orderBy('created_at', 'desc') );
    }

    public function fullname()
    {
        return $this->firstname . " " . $this->surname;
    }

    public function photo()
    {
        if( !empty($this->thumb) && file_exists( public_path() . MyClass::USER_PROFIL_PIC_DIR . $this->thumb)) {
            return MyClass::USER_PROFIL_PIC_DIR . $this->thumb;
        } else {
            return MyClass::USER_PROFIL_PIC_DIR . "user.png";
        }
    }

    public function getRole()
    {
        return isset(MyClass::$roles[$this->role]) ? MyClass::$roles[$this->role] : "-";
    }

    //delete profil pic if it is exist
    public function deletePic()
    {
        if( !empty($this->thumb) && file_exists( public_path() . MyClass::USER_PROFIL_PIC_DIR . $this->thumb) )
            unlink( public_path() . MyClass::USER_PROFIL_PIC_DIR . $this->thumb );
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /*public function delete()
    {
        $this->deletePic();

        parent::delete();
    }*/
}
