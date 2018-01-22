<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SearchRequest;
use App\Library\Date;
use App\Models\Announcement;
use App\Models\ProAnnouncement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    private $announcemetM = 1;

    public function indexAction(SearchRequest $request)
    {
        $this->announcemetM = $request->get('announcement', 1);

        $announcements = $this->announcemetM == 1 ? ProAnnouncement::realAnnouncements(false) : Announcement::realAnnouncements(false);

        $announcements->whereIn('type', Auth::user()->getAvailableTypes());
        $announcements->whereIn('buldingType', Auth::user()->getAvailableBuildingTypes());

        $this->getFilters($announcements, $request);
        $this->getSorting($announcements, $request);

        $announcements = $announcements->paginate( 50 );

        $data = [
            'request' => $request,
            'announcements' => $announcements
        ];



        return view('admin.search.search', $data);
    }

    public function getFilters($announcements, $request)
    {
        //filters

        if($request->has('header')) $announcements->where('header', 'like', '%'.$request->get('header').'%');
        if($request->has('content')) $announcements->where('content', 'like', '%'.$request->get('content').'%');
        if($request->has('type')) $announcements->where('type', $request->get('type'));
        if($request->has('buldingType')) $announcements->where('buldingType', $request->get('buldingType'));
        if($request->has('amount1')) $announcements->where("amount", '>=', $request->get('amount1'));
        if($request->has('amount2')) $announcements->where("amount", '<=', $request->get('amount2'));
        if($request->has('owner')) $announcements->where("owner", 'like', '%'.$request->get('owner').'%');
        if($request->has('mobnom')) $announcements->where("mobnom", 'like', '%'.$request->get('mobnom').'%');
        if($request->has('dateChk') && $request->has('date')) $announcements->where("date", Date::d($request->get('date'), 'Y-m-d'));

        if( $this->announcemetM === 1 )
        {
            if($request->has('status')) $announcements->where('status', $request->get('status'));

            if($request->has('documentType')) $announcements->where('documentType', $request->get('documentType'));

            if($request->has('user')) $announcements->where('userId', $request->get('user'));

            if($request->has('repairing')) $announcements->where('repairing', $request->get('repairing'));

            if($request->has('city')) $announcements->where("city", 'like', '%'.$request->get('city').'%');

            if($request->has('area1')) $announcements->where("area", '>=', $request->get('area1'));
            if($request->has('area2')) $announcements->where("area", '<=', $request->get('area2'));

            if($request->has('roomCount1')) $announcements->where("roomCount", '>=', $request->get('roomCount1'));
            if($request->has('roomCount2')) $announcements->where("roomCount", '<=', $request->get('roomCount2'));

            if($request->has('floorCount1')) $announcements->where("floorCount", '>=', $request->get('floorCount1'));
            if($request->has('floorCount2')) $announcements->where("floorCount", '<=', $request->get('floorCount2'));

            if($request->has('metro')) $announcements->where("metro", 'like', '%'.$request->get('metro').'%');

            if($request->has('locatedFloor1')) $announcements->where("locatedFloor", '>=', $request->get('locatedFloor1'));
            if($request->has('locatedFloor2')) $announcements->where("locatedFloor", '<=', $request->get('locatedFloor2'));
        }
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
            ///case 5:
            //    $announcements->orderBy('area', 'desc');
            //    break;
            //case 6:
            //    $announcements->orderBy('area', 'asc');
            //    break;
        }
    }
}
