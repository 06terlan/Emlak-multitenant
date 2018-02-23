<?php

namespace App\Models;

use App\Library\MyClass;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public $timestamps = false;

    public function delete()
    {
        $path1 = public_path( MyClass::ANN_PIC_DIR . $this->file_name );
        $path2 = public_path( MyClass::ANN_THUMB_PIC_DIR . $this->file_name );
        if( !empty($this->file_name) && file_exists($path1) ) @unlink($path1);
        if( !empty($this->file_name) && file_exists($path2) ) @unlink($path2);

        return parent::delete();
    }
}
