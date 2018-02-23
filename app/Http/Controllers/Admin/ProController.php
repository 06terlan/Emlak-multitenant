<?php



namespace App\Http\Controllers\Admin;



use App\Http\Requests\Admin\ProRequest;

use App\Http\Requests\Admin\ProSearchRequest;
use App\Library\Date;
use App\Library\MyClass;

use App\Library\MyHelper;

use App\Models\Announcement;
use App\Models\MskMakler;
use App\Models\Picture;
use App\Models\ProAnnouncement;

use App\Http\Controllers\Controller;

use App\Models\ProNumber;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Validator;

use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Request;



class ProController extends Controller

{

    //

    public function index(ProSearchRequest $request)

    {

        $announcements = ProAnnouncement::realAnnouncements()
                        ->select('*', DB::raw('(SELECT 1 FROM `pro_numbers` INNER JOIN msk_maklers ON msk_maklers.pure_number = pro_numbers.pure_number WHERE pro_numbers.pro_announcement_id = pro_announcements.id limit 1) as is_makler'));

        $announcements->whereIn('type', json_decode(Auth::user()->group->available_types) );
        $announcements->whereIn('buldingType', json_decode(Auth::user()->group->available_building_types) );

        if($request->has('type')) $announcements->where('type', $request->get('type'));
        if($request->has('status')) $announcements->whereIn('status', $request->get('status'));
        if($request->has('type') && $request->get('type') == "building" && $request->has('buldingSecondType')) $announcements->whereIn('type2', $request->get('buldingSecondType'));
        if($request->has('city')) $announcements->whereIn('city_id', $request->get('city'));
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

        $newAnnouncement->roomCount = in_array(Input::get("type"), ['land', 'garage', 'object', 'office']) ? null : Input::get("roomCount");

        $newAnnouncement->locatedFloor = in_array(Input::get("type"), ['land', 'garage', 'house', 'villa', 'garden_house']) ? null : Input::get("locatedFloor");

        $newAnnouncement->floorCount = in_array(Input::get("type"), ['land', 'garage']) ? null : Input::get("floorCount");

        $newAnnouncement->documentType = Input::get("documentType");

        $newAnnouncement->repairing = in_array(Input::get("type"), ['land']) ? null : Input::get("repairing");

        //new
        $newAnnouncement->metro_id = Input::get("metro");

        $newAnnouncement->city_id = Input::get("city");

        $newAnnouncement->place = Input::get("place");

        $newAnnouncement->owner = Input::get("owner");

        $newAnnouncement->owner_type = 0;

        $newAnnouncement->locations = Input::get("loc_lat") . "," . Input::get("loc_lng");

        $newAnnouncement->tenant_id = Auth::user()->tenant_id;

        $newAnnouncement->save();

        $numbers = [];
        ProNumber::where('pro_announcement_id', $announcement)->delete();
        foreach (Input::get("mobnom") as $number)
        {
            $numebrC = new ProNumber();
            $numebrC->number = $number;
            $numebrC->pure_number = MyHelper::pureNumber($number);

            $numbers[] = $numebrC->pure_number;
            $newAnnouncement->numbers()->save($numebrC);
        }

        if( count($numbers) > 0 && MskMakler::whereIn('pure_number', $numbers)->count() > 0 )
        {
            $newAnnouncement->owner_type = 1;
            $newAnnouncement->save();
        }

        //pictures
        if( $request->hasFile('pictures') )
        {
            $newAnnouncement->clearPictures();

            foreach ($request->file('pictures') as $key => $picture)
            {
                $newName = uniqid() . "." . $picture->extension();
                if( $picture->isValid() )
                {
                    Image::make($picture->getRealPath())->resize(200, 200)->save( public_path( MyClass::ANN_THUMB_PIC_DIR . $newName ) );
                    $picture->move(public_path(MyClass::ANN_PIC_DIR), $newName);


                    $pic = new Picture();
                    $pic->file_name = $newName;
                    $newAnnouncement->pictures()->save($pic);
                }
            }
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

        $newAnnouncement->roomCount = in_array(Input::get("type"), ['land', 'garage', 'object', 'office']) ? null : Input::get("roomCount");

        $newAnnouncement->locatedFloor = in_array(Input::get("type"), ['land', 'garage', 'house', 'villa', 'garden_house']) ? null : Input::get("locatedFloor");

        $newAnnouncement->floorCount = in_array(Input::get("type"), ['land', 'garage']) ? null : Input::get("floorCount");

        $newAnnouncement->documentType = Input::get("documentType");

        $newAnnouncement->repairing = in_array(Input::get("type"), ['land']) ? null : Input::get("repairing");

        //new
        $newAnnouncement->metro_id = Input::get("metro");

        $newAnnouncement->city_id = Input::get("city");

        $newAnnouncement->place = Input::get("place");

        $newAnnouncement->owner = Input::get("owner");

        $newAnnouncement->owner_type = 0;

        $newAnnouncement->link = $announcement->link;

        $newAnnouncement->locations = Input::get("loc_lat") . "," . Input::get("loc_lng");

        $newAnnouncement->tenant_id = Auth::user()->tenant_id;

        $newAnnouncement->save();

        $numbers = [];
        ProNumber::where('pro_announcement_id', $announcement)->delete();
        foreach (Input::get("mobnom") as $number)
        {
            $numebrC = new ProNumber();
            $numebrC->number = $number;
            $numebrC->pure_number = MyHelper::pureNumber($number);

            $numbers[] = $numebrC->pure_number;
            $newAnnouncement->numbers()->save($numebrC);
        }

        if( count($numbers) > 0 && MskMakler::whereIn('pure_number', $numbers)->count() > 0 )
        {
            $newAnnouncement->owner_type = 1;
            $newAnnouncement->save();
        }

        return redirect()->route('announcement_pro');

    }

    public function delete(Request $request, $announcement)
    {
        if($announcement == 0 && is_array(@json_decode($request->get('ids'))))
        {
            $ids = array_map(function ($n){ return (int)$n; }, json_decode($request->get('ids')));
            $anns = ProAnnouncement::realAnnouncements(false)->whereIn('id', $ids)->get();

            foreach ($anns as $ann)
            {
                $ann->clearPictures();
                $ann->deleted = 1;
                $ann->save();
            }

            return redirect()->back();
        }

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

