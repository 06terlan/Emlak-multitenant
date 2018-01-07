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
        return view( 'admin.home' );
    }

    public function test()
    {
        //house
        $siteComp = (new SiteComp([
            'link'          => 'http://tap.az/all/real-estate/apartments?p[740]=3722&p[747]=3849',
            'objectsDom'    => '.categories-products .products .products-i',
            'linkDom'       => '$this',
            'location'      => 'http://tap.az',
            'headerDom'     => '.lot-header .title-container h1',
            'contentDom'    => '.lot-body .lot-text',
            'amountDom'     => '.lot-header .price .price-val',
            'dateDom'       => '.aside-page .lot-info',
            'owner'         => ['.author .name', 0],
            'mobnom'        => ['.author .phone', 0],
            'type'          => 'new_bulding',
            'buldingType'   => self::TYPE_SATISH
        ]))->getObjectData(false);

        return "Count: ".$siteComp;
    }

}
