<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ReportAnnouncemetGraphicRequest;
use App\Library\Date;
use App\Library\MyClass;
use App\Models\ProAnnouncement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    #region GraphicReportAction

    public function announcementGraphicReportAction(ReportAnnouncemetGraphicRequest $request)
    {
        $announcements = ProAnnouncement::realAnnouncements(false);

        $date1 = $request->has('date1') ? Date::d($request->get('date1'), 'Y-m-d') : Date::d(null, 'Y-m-01');
        $date2 = $request->has('date2') ? Date::d($request->get('date2'), 'Y-m-d') : Date::d(null, 'Y-m-d');

        $announcements->whereIn('type', json_decode(Auth::user()->group->available_types) );
        $announcements->whereIn('buldingType', json_decode(Auth::user()->group->available_building_types) );

        $this->announcementGraphicReportGetFilters($announcements, $request);

        $announcements->groupBy('type', 'status', 'date')
            ->select(['type', 'status', 'date', DB::raw('count(1) as count')]);

        $groupData = [];
        $dataChartBar = [];
        $dataChartBar2 = [];
        foreach($announcements->get() as $announcement)
        {
            $dateS = Date::d($announcement->date, "d-m-Y");
            //bar2
            $status = isset(MyClass::$buttonStatus2[$announcement->status])? MyClass::$buttonStatus2[$announcement->status] : '-';
            if( !isset($groupData[$announcement->getAnnouncementType()]) )
            {
                $groupData[$announcement->getAnnouncementType()] = [];
                foreach (Date::range($date1, $date2, "d-m-Y") as $date)
                {
                    $groupData[$announcement->getAnnouncementType()][$date] = 0;
                }
                //bar
                $dataChartBar[$announcement->getAnnouncementType()] = ['name' => $announcement->getAnnouncementType(), 'value' => 0];
            }
            //bar2
            if( !isset($dataChartBar2[$status]) )
            {
                $dataChartBar2[$status] = ['name' => $status, 'value' => 0];
            }

            $groupData[$announcement->getAnnouncementType()][$dateS] = $announcement->count;
            //bar
            $dataChartBar[$announcement->getAnnouncementType()]['value'] += $announcement->count;
            //bar2
            $dataChartBar2[$status]['value'] += $announcement->count;
        }

        $data = [
            'request' => $request,
            'graphLine' => $groupData,
            'dataChartBar' => $dataChartBar,
            'dataChartBar2' => $dataChartBar2,
            'date1' => $date1,
            'date2' => $date2,
        ];

        return view('admin.report.announcement_graphic', $data);
    }

    public function announcementGraphicReportGetFilters($announcements, $request)
    {
        //filters
        if($request->has('buldingType')) $announcements->where('buldingType', $request->get('buldingType'));
        if($request->has('amount1')) $announcements->where("amount", '>=', $request->get('amount1'));
        if($request->has('amount2')) $announcements->where("amount", '<=', $request->get('amount2'));
        if($request->has('owner')) $announcements->where("owner", 'like', '%'.$request->get('owner').'%');
        if($request->has('mobnom'))  $announcements->whereHas('numbers', function ($query) use ($request){ $query->where('pure_number', 'like', '%'.MyHelper::pureNumber($request->get('mobnom')).'%'); });

        if($request->has('date1')) $announcements->where("date", '>=' ,Date::d($request->get('date1'), 'Y-m-d'));
        if($request->has('date2')) $announcements->where("date", '<=' ,Date::d($request->get('date2'), 'Y-m-d'));

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

        if($request->has('metro')) $announcements->where("metro_id", $request->get('metro'));

        if($request->has('locatedFloor1')) $announcements->where("locatedFloor", '>=', $request->get('locatedFloor1'));
        if($request->has('locatedFloor2')) $announcements->where("locatedFloor", '<=', $request->get('locatedFloor2'));

    }

    #endregion

}
