<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MapRequest;
use App\Http\Requests\Admin\SearchRequest;
use App\Library\Date;
use App\Library\MyClass;
use App\Library\MyHelper;
use App\Models\Announcement;
use App\Models\ProAnnouncement;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function indexAction(SearchRequest $request)
    {
        $rowCount = 48;
        $page = $request->get('page', 1);
        $offset = ( $page - 1 ) * $rowCount;

        $pro_announcements = ProAnnouncement::realAnnouncements(false);
        $announcements = Announcement::realAnnouncements(false);

        $this->getFilters($announcements, $pro_announcements, $request);
        $announcementsForCount = clone $announcements;

        $announcements_count = $announcementsForCount->select(DB::raw('count(1) as c'))->unionAll($pro_announcements->select(DB::raw('count(1) as c')))->get()->toArray();
        $announcements = $announcements->select('id','type',DB::raw('"0" as status'),'amount','owner','roomCount','area','link','site','owner_type','date','city_id','place','buldingType')
                                        ->unionAll($pro_announcements->select('id','type','status','amount','owner','roomCount','area','link',DB::raw('"-"'),'owner_type','date','city_id','place','buldingType'))->orderBy('id', 'DESC')
                                        ->offset($offset)->limit($rowCount)->get();
        $allCount = $announcements_count[0]['c'] + $announcements_count[1]['c'];

        //dd($announcements);
        $announcements = new LengthAwarePaginator($announcements, $allCount, $rowCount, $page, ['path' => $request->url(), 'query' => $request->query()]);

        $data = [
            'request' => $request,
            'announcements' => $announcements
        ];



        return view('admin.search.search', $data);
    }

    public function getFilters(&$announcements, &$pro_announcements, $request)
    {
        //filters

        if($request->has('status') || ($request->has('which') && $request->get('which')==2)) $announcements->where(DB::raw('1=2'));
        if($request->has('type')) $announcements->where('type', $request->get('type'));
        if($request->has('type') && $request->get('type') == "building" && $request->has('buldingSecondType')) $announcements->whereIn('type2', $request->get('buldingSecondType'));
        if($request->has('city')) $announcements->whereIn('city_id', $request->get('city'));
        if($request->has('buldingType')) $announcements->whereIn('buldingType', $request->get('buldingType'));
        if($request->has('amount1')) $announcements->where("amount", '>=', $request->get('amount1'));
        if($request->has('amount2')) $announcements->where("amount", '<=', $request->get('amount2'));
        if($request->has('date1')) $announcements->where("date", '>=' ,Date::d($request->get('date1'), 'Y-m-d'));
        if($request->has('date2')) $announcements->where("date", '<=' ,Date::d($request->get('date2'), 'Y-m-d'));
        if($request->has('ownerType')) $announcements->where("owner_type", $request->get('ownerType'));

        if($request->has('which') && $request->get('which')==1) $pro_announcements->where(DB::raw('1=2'));
        if($request->has('type')) $pro_announcements->where('type', $request->get('type'));
        if($request->has('type') && $request->get('type') == "building" && $request->has('buldingSecondType')) $pro_announcements->whereIn('type2', $request->get('buldingSecondType'));
        if($request->has('status')) $pro_announcements->whereIn('status', $request->get('status'));
        if($request->has('city')) $pro_announcements->whereIn('city_id', $request->get('city'));
        if($request->has('buldingType')) $pro_announcements->whereIn('buldingType', $request->get('buldingType'));
        if($request->has('amount1')) $pro_announcements->where("amount", '>=', $request->get('amount1'));
        if($request->has('amount2')) $pro_announcements->where("amount", '<=', $request->get('amount2'));
        if($request->has('date1')) $pro_announcements->where("date", '>=' ,Date::d($request->get('date1'), 'Y-m-d'));
        if($request->has('date2')) $pro_announcements->where("date", '<=' ,Date::d($request->get('date2'), 'Y-m-d'));
        if($request->has('ownerType')) $pro_announcements->where("owner_type", $request->get('ownerType'));
    }

    public function getSorting($announcements, $request)
    {
        switch ($request->get('sort'))
        {
            case 1:
                $announcements->orderBy('id', 'desc');
                break;
            case 2:
                $announcements->orderBy('id', 'asc');
                break;
            case 3:
                $announcements->orderBy('amount', 'desc');
                break;
            case 4:
                $announcements->orderBy('amount', 'asc');
                break;
            //case 5:
            //    $announcements->orderBy('area', 'desc');
            //    break;
            //case 6:
            //    $announcements->orderBy('area', 'asc');
            //    break;
        }
    }

    public function mapAction(MapRequest $request)
    {
        $markers = ProAnnouncement::realAnnouncements();

        $markers->whereIn('type', json_decode(Auth::user()->group->available_types) );
        $markers->whereIn('buldingType', json_decode(Auth::user()->group->available_building_types) );

        $this->mapGetFilters($markers, $request);

        $data = [
            'request' => $request,
            'markers' => $markers->take(1000)->get()
        ];

        return view('admin.search.map', $data);
    }

    public function mapGetFilters($markers, $request)
    {
        //filters

        if($request->has('content')) $markers->where('content', 'like', '%'.$request->get('content').'%');
        if($request->has('type')) $markers->where('type', $request->get('type'));
        if($request->has('buldingType')) $markers->where('buldingType', $request->get('buldingType'));
        if($request->has('amount1')) $markers->where("amount", '>=', $request->get('amount1'));
        if($request->has('amount2')) $markers->where("amount", '<=', $request->get('amount2'));
        if($request->has('owner')) $markers->where("owner", 'like', '%'.$request->get('owner').'%');
         if($request->has('site')) $markers->where("site", 'like', '%'.$request->get('site').'%');
        if($request->has('mobnom'))  $markers->whereHas('numbers', function ($query) use ($request){ $query->where('pure_number', 'like', '%'.MyHelper::pureNumber($request->get('mobnom')).'%'); });

        if($request->has('date1')) $markers->where("date", '>=' ,Date::d($request->get('date1'), 'Y-m-d'));
        if($request->has('date2')) $markers->where("date", '<=' ,Date::d($request->get('date2'), 'Y-m-d'));


        if($request->has('status')) $markers->where('status', $request->get('status'));

        if($request->has('documentType')) $markers->where('documentType', $request->get('documentType'));

        if($request->has('user')) $markers->where('userId', $request->get('user'));

        if($request->has('repairing')) $markers->where('repairing', $request->get('repairing'));

        if($request->has('city')) $markers->where("city", 'like', '%'.$request->get('city').'%');

        if($request->has('area1')) $markers->where("area", '>=', $request->get('area1'));
        if($request->has('area2')) $markers->where("area", '<=', $request->get('area2'));

        if($request->has('roomCount1')) $markers->where("roomCount", '>=', $request->get('roomCount1'));
        if($request->has('roomCount2')) $markers->where("roomCount", '<=', $request->get('roomCount2'));

        if($request->has('floorCount1')) $markers->where("floorCount", '>=', $request->get('floorCount1'));
        if($request->has('floorCount2')) $markers->where("floorCount", '<=', $request->get('floorCount2'));

        if($request->has('metro')) $markers->where("metro_id", $request->get('metro'));

        if($request->has('locatedFloor1')) $markers->where("locatedFloor", '>=', $request->get('locatedFloor1'));
        if($request->has('locatedFloor2')) $markers->where("locatedFloor", '<=', $request->get('locatedFloor2'));

    }
}
