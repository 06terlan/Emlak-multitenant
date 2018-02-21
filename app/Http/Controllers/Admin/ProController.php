<?php



namespace App\Http\Controllers\Admin;



use App\Http\Requests\Admin\ProRequest;

use App\Library\Date;
use App\Library\MyClass;

use App\Library\MyHelper;

use App\Models\Announcement;
use App\Models\ProAnnouncement;

use App\Http\Controllers\Controller;

use App\Models\ProNumber;
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

        $announcements = ProAnnouncement::realAnnouncements()
                        ->select('*', DB::raw('(SELECT 1 FROM `pro_numbers` INNER JOIN msk_maklers ON msk_maklers.pure_number = pro_numbers.pure_number WHERE pro_numbers.pro_announcement_id = pro_announcements.id limit 1) as is_makler'));

        $announcements->whereIn('type', json_decode(Auth::user()->group->available_types) );
        $announcements->whereIn('buldingType', json_decode(Auth::user()->group->available_building_types) );

        if($request->has('type')) $announcements->where('type', $request->get('type'));
        if($request->has('type') && $request->get('type') == "building" && $request->has('buldingSecondType')) $announcements->whereIn('type2', $request->get('buldingSecondType'));
        if($request->has('city')) $announcements->whereIn('city', $request->get('city'));
        if($request->has('buldingType')) $announcements->whereIn('buldingType', $request->get('buldingType'));
        if($request->has('amount1')) $announcements->where("amount", '>=', $request->get('amount1'));
        if($request->has('amount2')) $announcements->where("amount", '<=', $request->get('amount2'));
        if($request->has('date1')) $announcements->where("date", '>=' ,Date::d($request->get('date1'), 'Y-m-d'));
        if($request->has('date2')) $announcements->where("date", '<=' ,Date::d($request->get('date2'), 'Y-m-d'));
        if($request->has('ownerType')) $announcements->where("owner_type", $request->get('ownerType'));

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



    public function inserEditK(ProRequest $request, $announcement)
    {
        if($announcement == 0)
        {
            $newAnnouncement = new ProAnnouncement();
            $newAnnouncement->date = Date::d(null, "Y-m-d");
        }
        else
        {
            $newAnnouncement = ProAnnouncement::realAnnouncements(false)->find($announcement);

            if( !$newAnnouncement->exists() ) return response()->view("errors.403",[],403);
        }

        $newAnnouncement->userId = Input::get("user");

        $newAnnouncement->header = Input::get("header");

        $newAnnouncement->content = Input::get("content");

        $newAnnouncement->type = Input::get("type");

        $newAnnouncement->type2 = Input::get("type") == "building" ? Input::get("type2") : null;

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
        $newAnnouncement->metro_id = Input::get("metro");

        $newAnnouncement->city_id = Input::get("city");

        $newAnnouncement->place = Input::get("place");

        $newAnnouncement->owner = Input::get("owner");

         //$newAnnouncement->site = Input::get("site");

        $newAnnouncement->locations = Input::get("loc_lat") . "," . Input::get("loc_lng");

        $newAnnouncement->tenant_id = Auth::user()->tenant_id;

        $newAnnouncement->save();

        ProNumber::where('pro_announcement_id', $announcement)->delete();
        foreach (Input::get("mobnom") as $number)
        {
            $numebrC = new ProNumber();
            $numebrC->number = $number;
            $numebrC->pure_number = MyHelper::pureNumber($number);

            $newAnnouncement->numbers()->save($numebrC);
        }

        return redirect()->route('announcement_pro');

    }

    public function inserEditK2(ProRequest $request, Announcement $announcement)
    {
        $announcement->deleted_tenants()->attach(Auth::user()->tenant_id);

        //add
        $newAnnouncement = new ProAnnouncement();

        $newAnnouncement->date = Date::d(null, "Y-m-d");

        $newAnnouncement->userId = Input::get("user");

        $newAnnouncement->header = Input::get("header");

        $newAnnouncement->content = Input::get("content");

        $newAnnouncement->type = Input::get("type");

        $newAnnouncement->type2 = Input::get("type") == "building" ? Input::get("type2") : null;

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
        $newAnnouncement->metro_id = Input::get("metro");

        $newAnnouncement->city_id = Input::get("city");

        $newAnnouncement->place = Input::get("place");

        $newAnnouncement->owner = Input::get("owner");

        //$newAnnouncement->site = Input::get("site");

        $newAnnouncement->link = $announcement->link;

        $newAnnouncement->locations = Input::get("loc_lat") . "," . Input::get("loc_lng");

        $newAnnouncement->tenant_id = Auth::user()->tenant_id;

        $newAnnouncement->save();

        foreach (Input::get("mobnom") as $number)
        {
            $numebrC = new ProNumber();
            $numebrC->number = $number;
            $numebrC->pure_number = MyHelper::pureNumber($number);

            $newAnnouncement->numbers()->save($numebrC);
        }

        return redirect()->route('announcement_pro');

    }

    public function delete($announcement)
    {
        $announcement = ProAnnouncement::realAnnouncements()->find($announcement);

        if( !$announcement->exists() )
            return response()->view("errors.403",[],403);

        $announcement->deleted = 1;
        $announcement->save();



        return redirect()->route("announcement_pro");

    }

    public function statusAction(ProAnnouncement $announcement)
    {
        $st = $announcement->status;

        $announcement->status = $st == 1 ? 3 : ( $st == 2 ? 4 : ( $st == 3 ? 1 : 2 ) );

        $announcement->save();



        return redirect()->back();
    }



    public function InfoAction(ProAnnouncement $announcement)

    {

        $dataToBlade = [

            'announcement' 	=> $announcement

        ];



        return view('admin.pro.info',$dataToBlade);

    }

    public function addFromAction(Announcement $announcement)
    {
        $dataToBlade = [
            'announcement' 	=> $announcement,
            'from' => $announcement->id,
            'id' => 0,
        ];


        return view('admin.pro.announcement_add',$dataToBlade);
    }

}

