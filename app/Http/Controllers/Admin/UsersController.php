<?php

namespace App\Http\Controllers\Admin;

use App\Library\MyClass;
use App\Library\MyHelper;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdateSaveUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = User::realUsers();

        if($request->has('fullname')) $user->where(DB::raw('concat(COALESCE(firstname,"")," ",COALESCE(surname,""))'),'like','%'.$request->get('fullname').'%');
        if($request->has('email')) $user->where('email', 'like', '%'.$request->get('email').'%');
        if($request->has('login')) $user->where('login', 'like', '%'.$request->get('login').'%');
        if($request->has('role')) $user->where(DB::raw(MyHelper::createCase(MyClass::$roles, 'role')), 'like', '%'.$request->get('role').'%');

        $user = $user->paginate( MyClass::ADMIN_ROW_COUNT );

        $dataToBlade = [
            'Users' => $user,
            'request' => $request
        ];
        return view('admin.user.users',$dataToBlade);
    }

    public function addEdit($id)
    {
        $dataToBlade = [
            'id' => $id,
            'User' => User::realUsers()->where('id',$id)->first()
        ];

        return view('admin.user.userAddEdit',$dataToBlade);
    }

    public function addEditUser(UpdateSaveUserRequest $request,$id)
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
            $user->availableTypes = json_encode(Input::get("availableTypes",[]));
            $user->availableBuildingTypes = json_encode(Input::get("availableBuildingTypes",[]));
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
            $user->availableTypes = json_encode(Input::get("availableTypes",[]));
            $user->availableBuildingTypes = json_encode(Input::get("availableBuildingTypes",[]));
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

    public function delete(Request $request,$id)
    {
        if( Auth::user()->id != $id )
        {
            $user = User::realUsers()->where('id',$id)->first();
            $user->deleted = 1;
            $user->save();
        }

        return redirect("admin/users");
    }
}
