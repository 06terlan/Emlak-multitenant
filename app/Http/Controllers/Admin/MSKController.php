<?php

namespace App\Http\Controllers\Admin;

use App\Library\MyClass;
use App\Library\MyHelper;
use App\Models\Group;
use App\Models\MskMakler;
use App\Models\MskMetro;
use \Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MSKController extends Controller
{
    #region makler

    public function makler(Request $request)
    {
        $makles = MskMakler::realData()->paginate( MyClass::ADMIN_ROW_COUNT );

        //$announcements = $makles->paginate( MyClass::ADMIN_ROW_COUNT );

        return view( 'admin.msk.makler', [ 'makles' => $makles, 'request'=> $request ]);
    }

    public function maklerAddEdit(Request $request, $makler)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(), [
                'fullname' => 'required|string|min:5|max:30',
                'number' => 'required|string|min:14|max:14|unique:msk_maklers',
            ]);

            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            else
            {
                if($makler == 0)
                {
                    $maklerData = new MskMakler();
                }
                else
                {
                    $maklerData = MskMakler::find($makler);
                }

                $maklerData->fullname = $request->get('fullname');
                $maklerData->number = $request->get('number');
                $maklerData->pure_number = MyHelper::pureNumber($request->get('number'));
                $maklerData->save();

                return redirect()->route('msk_makler');
            }
        }
        else
        {
            $maklerData = MskMakler::find($makler);
            return view( 'admin.msk.maklerAddEdit', [ 'makler' => $maklerData, 'id' => $makler ]);
        }

    }

    public function maklerDelete(MskMakler $makler)
    {
        $makler->delete();

        return redirect()->back();
    }

    #endregion

    #region group

    public function group(Request $request)
    {
        $groups = Group::realData()->paginate( MyClass::ADMIN_ROW_COUNT );

        return view( 'admin.msk.group', [ 'groups' => $groups, 'request' => $request ]);
    }

    public function groupAddEdit(Request $request, $group)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(), [
                'group_name' => 'string|min:1|max:20',
                'available_types' => 'array',
                'available_building_types' => 'array',
                'available_modules' => 'array',
            ]);

            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            else
            {
                if($group == 0)
                {
                    $groupData = new Group();
                }
                else
                {
                    $groupData = Group::realData()->find($group);
                }

                $groupData->group_name = $request->get('group_name');
                $groupData->tenant_id = Auth::user()->group->super_admin == 1 ? $request->get('tenant',1) : Auth::user()->tenant_id;
                $groupData->available_types = json_encode($request->get('available_types', []));
                $groupData->available_building_types = json_encode($request->get('available_building_types', []));
                $groupData->available_modules = json_encode($request->get('available_modules', []));
                $groupData->save();

                return redirect()->route('msk_group');
            }
        }
        else
        {
            $groupData = Group::realData()->find($group);
            if($groupData === false) return response()->view("errors.403",[],403);
            return view( 'admin.msk.groupAddEdit', [ 'group' => $groupData, 'id' => $group ]);
        }

    }

    public function groupDelete(Group $group, MessageBag $message_bag)
    {
        if($group->users()->count() > 0) return redirect()->back()->withErrors($message_bag->add('error', 'Bu qrupa bağlı istifadəçilər var!'));
        if( $group->tenant_id != Auth::user()->tenant_id ) return response()->view("errors.403",[],403);

        $group->delete();

        return redirect()->back();
    }

    #endregion

    #region metro

    public function metro(Request $request)
    {
        $metros = MskMetro::paginate( MyClass::ADMIN_ROW_COUNT );

        return view( 'admin.msk.metro', [ 'metros' => $metros, 'request' => $request ]);
    }

    public function metroAddEdit(Request $request, $metro)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|min:1|max:50'
            ]);

            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            else
            {
                if($metro== 0)
                {
                    $metroData = new MskMetro();
                }
                else
                {
                    $metroData = MskMetro::find($metro);
                }

                $metroData->name = $request->get('name');
                $metroData->save();

                return redirect()->route('msk_metro');
            }
        }
        else
        {
            $metroData = MskMetro::find($metro);
            return view( 'admin.msk.metroAddEdit', [ 'metro' => $metroData, 'id' => $metro ]);
        }

    }

    public function metroDelete(MskMetro $metro)
    {
        $metro->delete();

        return redirect()->back();
    }

    #endregion
}
