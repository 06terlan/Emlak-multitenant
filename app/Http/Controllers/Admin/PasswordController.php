<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateUserPassRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Library\MyClass;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    private $validate;


    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('admin.password');
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
  
   
    private function updateUserDataPass(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->input("password"));
        $user->save();
    }
}
