<?php

namespace App\Http\Controllers\Admin;

use App\Library\DataFunctions\Functions;
use App\Library\MyClass;
use App\Library\MyHelper;
use App\Models\Announcement;
use App\Models\Number;
use App\Models\ProAnnouncement;
use App\Models\ProNumber;
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

    public function home()
    {
        return view( 'admin.home');
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
                'proAnnouncementsGroup' => $this->getProsChartData(),
                'agents' => User::realUsers()->count(),
                'announcements' => Announcement::realAnnouncements(false)->count(),
                'proAnnouncements' => ProAnnouncement::realAnnouncements(false)->count(),
                'announcementsToday' => Announcement::todayAnnouncements(false)->count(),
                'proAnnouncementsToday' => ProAnnouncement::todayAnnouncements(false)->count(),
            ];

        return view( 'admin.dashboard', $data);
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
                'label' => 'Elanlar',
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

    private function getProsChartData()
    {
        $posts = ProAnnouncement::todayAnnouncements(false)
            ->groupBy('type')
            ->select(['type',DB::raw('count(1) as count')])
            ->get()->toArray();

        $data = [
            'labels' => array_map( function($el){ return @MyClass::$announcementTypes[$el['type']]; } , $posts),
            'datasets' => [[
                'label' => 'Elanlar',
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

    public function test()
    {
        $count = (new SiteComp([
            'link'          => 'http://vipemlak.az/torpaq-satilir',
            'objectsDom'    => '.pranto',
            'linkDom'       => ['a', 0],
            'location'      => 'http://vipemlak.az',
            'headerDom'     => 'article h1',
            'contentDom'    => '#openhalf .infotd100',
            'amountDom'     => '.infotd2 span',
            'dateDom'       => '.clearfix .viewsbb',
            'owner'         => ['#openhalf .infotd2', 3],
            'mobnom'        => ['#openhalf .infotd2', 4],
            'type'          => 'land',
            'buldingType'   => self::TYPE_SATISH,
            'type2'         => null, //
            'cityDom'       => ['function', 'vipemlakGetCity'],
            'roomCountDom'  => null, //
            'areaDom'       => ['#openhalf .infotd2', 1], //
            'placeDom'       => ['#openhalf .infotd100', 1], //
        ],true))->getObjectData(false);

        return "End " . $count;
    }
}
