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
        $announcements = Announcement::realAnnouncements();

        $announcements->whereIn('type', Auth::user()->getAvailableTypes());
        $announcements->whereIn('buldingType', Auth::user()->getAvailableBuildingTypes());

        if($request->has('header')) $announcements->where('header', 'like', '%'.$request->get('header').'%');
        if($request->has('content')) $announcements->where('content', 'like', '%'.$request->get('content').'%');
        if($request->has('type')) $announcements->where('type', $request->get('type'));
        if($request->has('amount')) $announcements->where('amount', 'like', '%'.$request->get('amount').'%');
        if($request->has('date')) $announcements->where(DB::raw("DATE_FORMAT(date, '%d-%m-%Y')"), 'like', '%'.$request->get('date').'%');

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

    public function delete($id)
    {
        $post = Announcement::find($id);
        $post->deleted = 1;
        $post->save();
        
        return redirect()->route("announcement");
    }
}
