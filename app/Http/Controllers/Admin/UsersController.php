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
        if($request->has('group_id')) $user->where('group_id', $request->get('group_id'));
        if($request->has('tenant')) $user->where('tenant_id', $request->get('tenant'));

        $user = $user->paginate( MyClass::ADMIN_ROW_COUNT );

        $dataToBlade = [
            'Users' => $user,
            'request' => $request
        ];
        return view('admin.user.users',$dataToBlade);
    }

    public function addEdit($id)
    {
        $user = User::realUsers()->where('id',$id)->first();

        $dataToBlade = [
            'id' => $id,
            'User' => $user
        ];

        if( $id > 0 && $user->group->super_admin == 1 ) return response()->view("errors.403",[],403);
        else return view('admin.user.userAddEdit',$dataToBlade);
    }

    public function addEditUser(UpdateSaveUserRequest $request,$id)
    {
        $tenant_id = Auth::user()->tenant_id;

        if( Auth::user()->group->super_admin == 1 )
        {
            $validate = Validator::make($request->all(), ['tenant' => 'integer|exists:tenants,id']);
            if($validate->fails()) return redirect()->back()->withErrors($validate);

            $tenant_id = $request->get('tenant');
        }

        if($id == 0)
        {
            $validate = Validator::make($request->all(), ['password' => 'required|string|min:6|max:20']);
            if($validate->fails()) return redirect()->back()->withErrors($validate);

            $user = new User();
            $user->tenant_id = $tenant_id;
            $user->firstname = Input::get("name");
            $user->surname = Input::get("surname","");
            $user->email = Input::get("email");
            $user->login = Input::get("login");
            $user->password = Hash::make(Input::get("password"));
            $user->group_id = Input::get("group_id");

            $user->save();
        }
        else
        {
            $user = User::find($id);

            if( $user->group->super_admin == 1 ) return response()->view("errors.403",[],403);

            $user->tenant_id = $tenant_id;
            $user->firstname = Input::get("name");
            $user->surname = Input::get("surname","");
            $user->email = Input::get("email");
            $user->login = Input::get("login");
            $user->group_id = Input::get("group_id");

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

    public function delete(User $user)
    {
        if( Auth::user()->id != $user->id && $user->group->super_admin != 1)
        {
            $user->deleted = 1;
            $user->save();
        }
        else return response()->view("errors.403",[],403);

        return redirect("admin/users");
    }
}
