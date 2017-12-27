<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProRequest;
use App\Library\MyClass;
use App\Models\ProAnnouncement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ProController extends Controller
{
    //
    public function index()
    {
        $announcements = ProAnnouncement::realAnnouncements()->paginate( MyClass::ADMIN_ROW_COUNT );
        return view('admin.pro.announcements',['announcements' => $announcements]);
    }

    public function inserEditAction($announcement)
    {
        $dataToBlade = [
            'announcement' 	=> ProAnnouncement::find($announcement),
            'id' => $announcement,
        ];

        return view('admin.pro.announcement_add',$dataToBlade);
    }

    public function inserEditK(ProRequest $request, $announcement)
    {
        if($announcement == 0)
        {
            $newAnnouncement = new ProAnnouncement();
            $newAnnouncement->userId = Auth::user()->id;
            $newAnnouncement->header = Input::get("header");
            $newAnnouncement->content = Input::get("content");
            $newAnnouncement->type = Input::get("type");
            $newAnnouncement->amount = Input::get("amount");
            $newAnnouncement->area = Input::get("area");

            $newAnnouncement->roomCount = Input::get("roomCount");
            $newAnnouncement->locatedFloor = Input::get("locatedFloor");
            $newAnnouncement->floorCount = Input::get("floorCount");
            $newAnnouncement->documentType = Input::get("documentType");
            $newAnnouncement->repairing = Input::get("repairing");

            $newAnnouncement->save();
        }
        else
        {
            $editAnnouncement = ProAnnouncement::find($announcement);
            $editAnnouncement->userId = Auth::user()->id;
            $editAnnouncement->header = Input::get("header");
            $editAnnouncement->content = Input::get("content");
            $editAnnouncement->type = Input::get("type");
            $editAnnouncement->amount = Input::get("amount");
            $editAnnouncement->area = Input::get("area");

            $editAnnouncement->roomCount = Input::get("roomCount");
            $editAnnouncement->locatedFloor = Input::get("locatedFloor");
            $editAnnouncement->floorCount = Input::get("floorCount");
            $editAnnouncement->documentType = Input::get("documentType");
            $editAnnouncement->repairing = Input::get("repairing");

            $editAnnouncement->save();
        }

        return redirect()->route('announcement_pro');
    }

    public function delete(ProAnnouncement $announcement)
    {
        $announcement->deleted = 1;
        $announcement->save();

        return redirect()->route("announcement_pro");
    }

    public function InfoAction(ProAnnouncement $announcement)
    {
        $dataToBlade = [
            'announcement' 	=> $announcement
        ];

        return view('admin.pro.info',$dataToBlade);
    }
}
