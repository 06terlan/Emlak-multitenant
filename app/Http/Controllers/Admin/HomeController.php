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
            'link'          => 'http://tap.az/all/real-estate/apartments?p[740]=3724&p[747]=3849',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'building',
            'buldingType'   => self::TYPE_ICARE,
            'type2'         => 'new', //
            'cityDom'       => ['function', 'tapazGetCity'],
            'roomCountDom'  => [['.property', 4], ['.property-value', 0]],
            'areaDom'       => [['.property', 3], ['.property-value', 0]],
            'placeDom'      => [['.property', 5], ['.property-value', 0]],
            'metroDom'      => ['function', 'getMetroTapaz'], //
        ],true))->getObjectData(false);

        return "End " . $count;
    }
}
