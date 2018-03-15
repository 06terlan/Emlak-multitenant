<?php

namespace App\Http\Controllers\Admin;

use App\Library\Date;
use App\Library\MyHelper;
use App\Models\Announcement;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Library\MyClass;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    public function index(PostRequest $request)
    {
        $announcements = Announcement::realAnnouncements(true)->with('city');

        $announcements->whereIn('type', json_decode(Auth::user()->group->available_types) );
        $announcements->whereIn('buldingType', json_decode(Auth::user()->group->available_building_types) );

        if($request->has('type')) $announcements->where('type', $request->get('type'));
        if($request->has('type') && $request->get('type') == "building" && $request->has('buldingSecondType')) $announcements->whereIn('type2', $request->get('buldingSecondType'));
        if($request->has('city')) $announcements->whereIn('city_id', $request->get('city'));
        if($request->has('buldingType')) $announcements->whereIn('buldingType', $request->get('buldingType'));
        if($request->has('amount1')) $announcements->where("amount", '>=', $request->get('amount1'));
        if($request->has('amount2')) $announcements->where("amount", '<=', $request->get('amount2'));
        if($request->has('date1')) $announcements->where("date", '>=' ,Date::d($request->get('date1'), 'Y-m-d'));
        if($request->has('date2')) $announcements->where("date", '<=' ,Date::d($request->get('date2'), 'Y-m-d'));
        if($request->has('ownerType')) $announcements->where("owner_type", $request->get('ownerType'));
        if($request->has('metro')) $announcements->whereIn('metro_id', $request->get('metro'));
        //if($request->has('locatedFloor1')) $announcements->where("locatedFloor", '>=', $request->get('locatedFloor1'));
        //if($request->has('locatedFloor2')) $announcements->where("locatedFloor", '<=', $request->get('locatedFloor2'));

        $announcements = $announcements->paginate( MyClass::ADMIN_ROW_COUNT );

        return view('admin.post.announcements',['announcements' => $announcements,'request' => $request]);
    }

    public function InfoAction(Announcement $announcement)
    {
    	$dataToBlade = [
            'announcement' 	=> $announcement
        ];

        return view('admin.post.announcement_info',$dataToBlade);
    }

    public function delete(Request $request, $announcement)
    {
        if($announcement == 0 && is_array(@json_decode($request->get('ids'))))
        {
            $ids = array_map(function ($n){ return (int)$n; }, json_decode($request->get('ids')));
            $anns = Announcement::realAnnouncements(false)->whereIn('id', $ids)->get();

            foreach ($anns as $ann)
            {
                //$ann->clearPictures();
                $ann->deleted_tenants()->attach(Auth::user()->tenant_id);
            }

            return redirect()->back();
        }

        $announcement = Announcement::realAnnouncements(false)->find($announcement);

        if( !$announcement->exists() )
            return response()->view("errors.403",[],403);

        if( Auth::user()->group->super_admin == 1 ) $announcement->delete();
        else $announcement->deleted_tenants()->attach(Auth::user()->tenant_id);
        
        return redirect()->back();
    }
}
