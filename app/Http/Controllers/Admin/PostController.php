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
        $announcements = Announcement::realAnnouncements()
            ->select('*', DB::raw('(SELECT 1 FROM `numbers` INNER JOIN msk_maklers ON msk_maklers.pure_number = numbers.pure_number WHERE numbers.announcement_id = announcements.id limit 1) as is_makler'));

        $announcements->whereIn('type', json_decode(Auth::user()->group->available_types) );
        $announcements->whereIn('buldingType', json_decode(Auth::user()->group->available_building_types) );

        if($request->has('type')) $announcements->where('type', $request->get('type'));
        if($request->has('buldingSecondType')) $announcements->whereIn('type2', $request->get('buldingSecondType'));
        if($request->has('city')) $announcements->whereIn('city', $request->get('city'));
        if($request->has('buldingType')) $announcements->whereIn('buldingType', $request->get('buldingType'));
        if($request->has('amount1')) $announcements->where("amount", '>=', $request->get('amount1'));
        if($request->has('amount2')) $announcements->where("amount", '<=', $request->get('amount2'));
        if($request->has('date1')) $announcements->where("date", '>=' ,Date::d($request->get('date1'), 'Y-m-d'));
        if($request->has('date2')) $announcements->where("date", '<=' ,Date::d($request->get('date2'), 'Y-m-d'));
        if($request->has('ownerType')) $announcements->where("owner_type", $request->get('ownerType'));

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

    public function delete($announcement)
    {
        $announcement = Announcement::realAnnouncements(false)->find($announcement);

        if( !$announcement->exists() )
            return response()->view("errors.403",[],403);

        if( Auth::user()->group->super_admin == 1 ) $announcement->delete();
        else $announcement->deleted_tenants()->attach(Auth::user()->tenant_id);
        
        return redirect()->route("announcement");
    }
}
