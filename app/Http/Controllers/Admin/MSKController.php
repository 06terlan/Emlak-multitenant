<?php

namespace App\Http\Controllers\Admin;

use App\Library\MyClass;
use App\Library\MyHelper;
use App\Models\Group;
use App\Models\MskCity;
use App\Models\MskMakler;
use App\Models\MskMetro;
use App\Models\MskType;
use App\Models\Tenant;
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

                $available_modules = $request->get('available_modules', []);
                $check_modules = Auth::user()->group->super_admin == 1 ? Tenant::find($request->get('tenant'))->msk_type->getAvailableModules() : Auth::user()->group->tenant->msk_type->getAvailableModules();
                foreach ($available_modules as $key => $val) if( !isset($check_modules[$key]) || $check_modules[$key] < 2 ) unset($available_modules[$key]);

                $groupData->group_name = $request->get('group_name');
                $groupData->tenant_id = Auth::user()->group->super_admin == 1 ? $request->get('tenant') : Auth::user()->tenant_id;
                $groupData->available_types = json_encode($request->get('available_types', []));
                $groupData->available_building_types = json_encode($request->get('available_building_types', []));
                $groupData->available_modules = json_encode($available_modules);
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

    #region city

    public function city(Request $request)
    {
        $cities = MskCity::paginate( MyClass::ADMIN_ROW_COUNT );

        return view( 'admin.msk.city', [ 'cities' => $cities, 'request' => $request ]);
    }

    public function cityAddEdit(Request $request, $city)
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
                if($city== 0)
                {
                    $cityData = new MskCity();
                }
                else
                {
                    $cityData = MskCity::find($city);
                }

                $cityData->name = $request->get('name');
                $cityData->save();

                return redirect()->route('msk_city');
            }
        }
        else
        {
            $cityData = MskCity::find($city);
            return view( 'admin.msk.cityAddEdit', [ 'metro' => $cityData, 'id' => $city ]);
        }

    }

    public function cityDelete(MskCity $city)
    {
        $city->delete();

        return redirect()->back();
    }

    #endregion

    #region type

    public function type(Request $request)
    {
        $types = MskType::paginate( MyClass::ADMIN_ROW_COUNT );

        return view( 'admin.msk.type', [ 'types' => $types, 'request' => $request ]);
    }

    public function typeAddEdit(Request $request, $type)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(), [
                'type_name' => 'string|min:1|max:30',
                'user_count' => 'integer|min:1|max:100',
                'amount'    => 'integer|min:1|max:50000',
                'available_modules' => 'array',
            ]);

            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            else
            {
                if($type == 0)
                {
                    $typeData = new MskType();
                }
                else
                {
                    $typeData = MskType::find($type);
                }

                $typeData->name = $request->get('type_name');
                $typeData->user_count = $request->get('user_count');
                $typeData->amount = $request->get('amount');
                $typeData->available_modules = json_encode($request->get('available_modules', []));
                $typeData->save();

                return redirect()->route('msk_type');
            }
        }
        else
        {
            $typeData = MskType::find($type);
            if($typeData === false) return response()->view("errors.403",[],403);
            return view( 'admin.msk.typeAddEdit', [ 'type' => $typeData, 'id' => $type ]);
        }

    }

    public function typeDelete(MskType $type, MessageBag $message_bag)
    {
        if($type->tenants()->count() > 0) return redirect()->back()->withErrors($message_bag->add('error', 'Bağlı tenantlar var!'));

        $type->delete();

        return redirect()->back();
    }

    #endregion
}
