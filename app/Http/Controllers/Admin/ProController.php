<?php



namespace App\Http\Controllers\Admin;



use App\Http\Requests\Admin\ProRequest;

use App\Library\MyClass;

use App\Library\MyHelper;

use App\Models\ProAnnouncement;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Validator;

use Symfony\Component\HttpFoundation\Request;



class ProController extends Controller

{

    //

    public function index(Request $request)

    {

        $announcements = ProAnnouncement::realAnnouncements();

        $announcements->whereIn('type', Auth::user()->getAvailableTypes());
        $announcements->whereIn('buldingType', Auth::user()->getAvailableBuildingTypes());

        if($request->has('header')) $announcements->where('header', 'like', '%'.$request->get('header').'%');

        if($request->has('content')) $announcements->where('content', 'like', '%'.$request->get('content').'%');

        if($request->has('type')) $announcements->where('type', $request->get('type'));

        if($request->has('amount')) $announcements->where('amount', 'like', '%'.$request->get('amount').'%');

        if($request->has('date')) $announcements->where(DB::raw("DATE_FORMAT(date, '%d-%m-%Y')"), 'like', '%'.$request->get('date').'%');

        if($request->has('status')) $announcements->where('status', $request->get('status'));

        /*if($request->has('user'))

        {

            $request->with('author');

            //$announcements->where('amount', 'like', '%'.$request->get('amount').'%');

        }*/



        $announcements = $announcements->paginate( MyClass::ADMIN_ROW_COUNT );



        return view('admin.pro.announcements',['announcements' => $announcements,'request' => $request]);

    }



    public function inserEditAction($announcement)

    {

        $dataToBlade = [

            'announcement' 	=> ProAnnouncement::find($announcement),

            'id' => $announcement,

        ];



        return view('admin.pro.announcement_add',$dataToBlade);

    }



    public function inserEditK( $announcement)

    {
        if($announcement == 0)

        {

            $newAnnouncement = new ProAnnouncement();

            $newAnnouncement->userId = Input::get("user");

            $newAnnouncement->header = Input::get("header");

            $newAnnouncement->content = Input::get("content");

            $newAnnouncement->type = Input::get("type");

            $newAnnouncement->buldingType = Input::get("buldingType");
            $newAnnouncement->status = Input::get("buldingType");

            $newAnnouncement->amount = Input::get("amount");

            $newAnnouncement->area = Input::get("area");



            $newAnnouncement->roomCount = Input::get("roomCount");

            $newAnnouncement->locatedFloor = Input::get("locatedFloor");

            $newAnnouncement->floorCount = Input::get("floorCount");

            $newAnnouncement->documentType = Input::get("documentType");

            $newAnnouncement->repairing = Input::get("repairing");

            //new
            $newAnnouncement->metro = Input::get("metro");

            $newAnnouncement->city = Input::get("city");

            $newAnnouncement->owner = Input::get("owner");

            $newAnnouncement->mobnom = json_encode(Input::get("mobnom"));



            $newAnnouncement->save();

        }

        else

        {

            $editAnnouncement = ProAnnouncement::find($announcement);

            $editAnnouncement->userId = Input::get("user");

            $editAnnouncement->header = Input::get("header");

            $editAnnouncement->content = Input::get("content");

            $editAnnouncement->type = Input::get("type");

            $editAnnouncement->buldingType = Input::get("buldingType");
            $editAnnouncement->status = Input::get("buldingType");

            $editAnnouncement->amount = Input::get("amount");

            $editAnnouncement->area = Input::get("area");



            $editAnnouncement->roomCount = Input::get("roomCount");

            $editAnnouncement->locatedFloor = Input::get("locatedFloor");

            $editAnnouncement->floorCount = Input::get("floorCount");

            $editAnnouncement->documentType = Input::get("documentType");

            $editAnnouncement->repairing = Input::get("repairing");

            //new
            $editAnnouncement->metro = Input::get("metro");

            $editAnnouncement->city = Input::get("city");

            $editAnnouncement->owner = Input::get("owner");

            $editAnnouncement->mobnom = json_encode(Input::get("mobnom"));



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

    public function statusAction(ProAnnouncement $announcement)
    {
        $st = $announcement->status;

        $announcement->status = $st == 1 ? 3 : ( $st == 2 ? 4 : ( $st == 3 ? 1 : 2 ) );

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

