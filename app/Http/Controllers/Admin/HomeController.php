<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Models\Contact;
use App\Models\Post;
use App\Library\Date;

use App\Library\Dom\Dom;
use App\Library\ErrorLog;
use App\Library\SiteComp\SiteComp;

class HomeController extends Controller
{
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
        return view( 'admin.home' );
    }

    public function test()
    {
        $siteComp = new SiteComp([
                'link'          => 'http://emlak.az/elanlar/?ann_type=1&tip[]=3',
                'objectsDom'    => 'div.ticket-list .ticket',
                'linkDom'       => '.title a',
                'location'      => 'http://emlak.az',
                'headerDom'     => '.panel .title',
                'contentDom'    => '.left-bar .desc',
                'amountDom'     => '.left-bar .price .m',
                'dateDom'       => '.box-panel .date strong'
            ]);

        return "sad";
    }

}
