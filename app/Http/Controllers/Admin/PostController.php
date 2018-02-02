<?php

namespace App\Http\Controllers\Admin;

use App\Library\MyHelper;
use App\Models\Announcement;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Library\MyClass;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $announcements = Announcement::realAnnouncements()
            ->select('*', DB::raw('(SELECT 1 FROM `numbers` INNER JOIN msk_maklers ON msk_maklers.pure_number = numbers.pure_number WHERE numbers.announcement_id = announcements.id limit 1) as is_makler'));

        $announcements->whereIn('type', json_decode(Auth::user()->group->available_types) );
        $announcements->whereIn('buldingType', json_decode(Auth::user()->group->available_building_types) );

        if($request->has('header')) $announcements->where('header', 'like', '%'.$request->get('header').'%');
        if($request->has('content')) $announcements->where('content', 'like', '%'.$request->get('content').'%');
        if($request->has('type')) $announcements->where('type', $request->get('type'));
        if($request->has('amount')) $announcements->where('amount', 'like', '%'.$request->get('amount').'%');
        if($request->has('date')) $announcements->where(DB::raw("DATE_FORMAT(date, '%d-%m-%Y')"), 'like', '%'.$request->get('date').'%');
        if($request->has('no_makler')) $announcements->where(DB::raw("(SELECT 1 FROM `numbers` INNER JOIN msk_maklers ON msk_maklers.pure_number = numbers.pure_number WHERE numbers.announcement_id = announcements.id limit 1)"),  null);

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
