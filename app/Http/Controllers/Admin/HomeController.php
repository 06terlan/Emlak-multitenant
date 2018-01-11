<?php

namespace App\Http\Controllers\Admin;

use App\Library\MyClass;
use App\Models\Announcement;
use App\Models\ProAnnouncement;
use Illuminate\Http\Request;
use App\User;
use App\Models\Contact;
use App\Models\Post;
use App\Library\Date;

use App\Library\Dom\Dom;
use App\Library\ErrorLog;
use App\Library\SiteComp\SiteComp;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    const TYPE_ICARE = 1;
    const TYPE_SATISH = 2;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =
            [
                'announcementsGroup' => $this->getPostsChartData(),
                'agents' => User::realUsers()->count(),
                'announcements' => Announcement::realAnnouncements(false)->count(),
                'proAnnouncements' => ProAnnouncement::realAnnouncements(false)->count(),
                'announcementsToday' => Announcement::todayAnnouncements(false)->count(),
                'proAnnouncementsToday' => ProAnnouncement::todayAnnouncements(false)->count(),
            ];

        return view( 'admin.home', $data);
    }

    public function test()
    {
        //house


        return "Count: ";
    }


    private function getPostsChartData()
    {
        $posts = Announcement::todayAnnouncements(false)
            ->groupBy('type')
            ->select(['type',DB::raw('count(1) as count')])
            ->get()->toArray();

        $data = [
            'labels' => array_map( function($el){ return @MyClass::$announcementTypes[$el['type']]; } , $posts),
            'datasets' => [[
                'label' => 'Posts',
                'data' => array_map(function($el){ return $el['count']; }, $posts),
                'backgroundColor' => [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                ]
            ]]
        ];
        return $data;
    }
}
