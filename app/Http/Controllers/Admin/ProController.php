<?php

namespace App\Http\Controllers\Admin;

use App\Library\MyClass;
use App\Models\ProAnnouncement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProController extends Controller
{
    //
    public function index()
    {
        $announcements = ProAnnouncement::realAnnouncements()->paginate( MyClass::ADMIN_ROW_COUNT );
        return view('admin.pro.announcements',['announcements' => $announcements]);
    }

    public function inserEditAction($announcement)
    {
        $dataToBlade = [
            'announcement' 	=> ProAnnouncement::find($announcement),
            'id' => $announcement,
        ];

        return view('admin.pro.announcement_add',$dataToBlade);
    }

    public function inserEdit(UpdateSaveUserRequest $request,$id)
    {
        if($id == 0)
        {
            $validate = Validator::make($request->all(), ['password' => 'required|string|min:6']);
            if($validate->fails()) return redirect()->back()->withErrors($validate);

            $user = new User();
            $user->firstname = Input::get("name");
            $user->surname = Input::get("surname","");
            $user->email = Input::get("email");
            $user->login = Input::get("login");
            $user->password = Hash::make(Input::get("password"));
            $user->role = Input::get("role");

            $user->save();
        }
        else
        {
            $user = User::find($id);;
            $user->firstname = Input::get("name");
            $user->surname = Input::get("surname","");
            $user->email = Input::get("email");
            $user->login = Input::get("login");
            $user->role = Input::get("role");

            if( !empty(Input::get("password","")) )
            {
                $validate = Validator::make($request->all(), ['password' => 'required|string|min:6']);
                if($validate->fails()) return redirect()->back()->withErrors($validate);

                $user->password = Hash::make(Input::get("password"));
            }

            $user->save();
        }

        return redirect("admin/users");
    }
}
