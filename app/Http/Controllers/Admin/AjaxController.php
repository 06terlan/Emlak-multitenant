<?php

namespace App\Http\Controllers\Admin;

use App\Library\Date;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class AjaxController extends Controller
{
    //
    public function getLastAnnouncement(Request $request)
    {
        if($request->has('lastId') && $request->get('lastId') >= 0 )
        {
            $lastId = $request->get('lastId');
            $view = "";

            $announcements = Announcement::where('date' , Date::d(null, "Y-m-d"))
                ->where('id', '>', $request->get('lastId'))
                ->orderBy('id', 'asc')->take(10)->get()->toArray();

            if(count($announcements) > 0)
            {
                $announcements = array_reverse($announcements);
                $lastId = $announcements[0]['id'];

                $view = View::make('admin.notfication', ['announcements' => $announcements ])->render();
            }

            $data =
             [
                 'status' => 'success',
                 'lastId' => $lastId,
                 'view' => $view,
                 'announcement' => $announcements
             ];

            return response()->json($data);
        }
        return response()->json(['status' => 'error']);
    }
}
