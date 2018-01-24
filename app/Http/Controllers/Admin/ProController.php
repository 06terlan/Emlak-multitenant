<?php



namespace App\Http\Controllers\Admin;



use App\Http\Requests\Admin\ProRequest;

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

        $announcements->whereIn('type', Auth::user()->getAvailableTypes());
        $announcements->whereIn('buldingType', Auth::user()->getAvailableBuildingTypes());

        if($request->has('header')) $announcements->where('header', 'like', '%'.$request->get('header').'%');

        if($request->has('content')) $announcements->where('content', 'like', '%'.$request->get('content').'%');

        if($request->has('type')) $announcements->where('type', $request->get('type'));

        if($request->has('amount')) $announcements->where('amount', 'like', '%'.$request->get('amount').'%');

        if($request->has('date')) $announcements->where(DB::raw("DATE_FORMAT(date, '%d-%m-%Y')"), 'like', '%'.$request->get('date').'%');

        if($request->has('status')) $announcements->where('status', $request->get('status'));

        if($request->has('user'))
        {
            $announcements->whereHas('author', function ($query) use ($request){

               $query->where(DB::raw("concat(COALESCE(firstname,''),' ',COALESCE(surname,''))"), 'like', "%".$request->get("user")."%");
            });
        }

        if($request->has('no_makler')) $announcements->where(DB::raw("(SELECT 1 FROM `pro_numbers` INNER JOIN msk_maklers ON msk_maklers.pure_number = pro_numbers.pure_number WHERE pro_numbers.pro_announcement_id = announcements.id limit 1)"),  null);

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
        }
        else
        {
            $newAnnouncement = ProAnnouncement::find($announcement);
        }

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

        if( $request->get('from') > 0 )
        {
            $ann = Announcement::find($request->get('from'));
            $newAnnouncement->link = $ann->link;
            $ann->deleted = 1;
            $ann->save();
        }

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

