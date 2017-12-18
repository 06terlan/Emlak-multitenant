<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateUserPassRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Library\MyClass;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Validator;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $validate;


    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('admin.profile');
    }

    public function update(Request $request,$which)
    {
        if($which==1)
        {
            $UpdateUserRequestR = new UpdateUserRequest();
            $this->validate = Validator::make($request->all(), $UpdateUserRequestR->rules());
            if(!$this->validate->fails()) $this->updateUserData($request);
        }
        else if($which==2)
        {
            $UpdateUserPassRequestR = new UpdateUserPassRequest();
            $this->validate = Validator::make($request->all(), $UpdateUserPassRequestR->rules());
            if(!$this->validate->fails()) $this->updateUserDataPass($request);
        }


        return redirect()->back()->withErrors($this->validate);
    }

    //
    private function updateUserData(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if($request->hasFile('image') && $request->file('image')->isValid() && in_array($request->file('image')->getClientOriginalExtension(),MyClass::$imageTypes))
        {
            $image = $request->file('image');
            $filename = str_random(20) . "." . $image->getClientOriginalExtension();
            $path = public_path( MyClass::USER_PROFIL_PIC_DIR . $filename );

            $user->deletePic();

            Image::make($image->getRealPath())->resize(200, 200)->save($path);
            $user->thumb = $filename;
        }


        $user->firstname    = $request->input("name");
        $user->surname      = $request->input("surname","");
        $user->email        = $request->input("email");
        $user->save();
    }

    private function updateUserDataPass(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->input("password"));
        $user->save();
    }
}
