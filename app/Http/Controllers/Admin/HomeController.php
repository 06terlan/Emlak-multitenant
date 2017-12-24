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
        //
        $siteComp = (new SiteComp([
                'link'          => 'https://bina.az/alqi-satqi/menziller/yeni-tikili',
                'objectsDom'    => [['.items_list', 1] , ['.items-i']],
                'linkDom'       => 'a.item_link',
                'location'      => 'https://bina.az',
                'headerDom'     => '.price_header .services-container h1',
                'contentDom'    => '.side article',
                'amountDom'     => '.price .price-val',
                'dateDom'       => '.info .item_info',
                'type'          => 'new_bulding'
            ]))->getObjectData();



        return "Count: ".$siteComp;
    }

}
