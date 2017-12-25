<?php

namespace App\Http\Controllers\Admin;

use App\Library\Date;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    //
    public function getLastAnnouncement(Request $request)
    {
        if($request->has('lastId') && $request->get('lastId') > 0 && $request->get('currentNotficationCount') >= 0 )
        {
            $currentNotficationCount = $request->get('currentNotficationCount');
            $maxNotficationCount = \App\Library\MyClass::INFO_COUNT;
            $count = $maxNotficationCount - $currentNotficationCount;

            $count = $count > 0 ? $count : 0;

            if($count > 0)
            {
                $announcements = Announcement::where('date' , Date::d(null, "Y-m-d"))
                    ->where('id', '>', $request->get('lastId'))
                    ->orderBy('id', 'asc')->take($count)->get();

                $view = View::make('my_view', ['name' => $announcements]);
            }

            $data =
             [
                 'status' => 'success',
                 'announcement' => $announcements
             ];

            return response()->json($data);
        }
        return response()->json(['status' => 'error']);
    }
}
