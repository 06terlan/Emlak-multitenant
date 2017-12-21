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
        /*$dom = new Dom();
        $html = $dom->file_get_html('http://emlak.az/elanlar/?ann_type=1&tip[]=3');
        
        if($html === false) dump("Seife acilmir");

        $emlaks = $html->find('div.ticket-list .ticket'); //all emlak
        foreach ($emlaks as $emlak)
        {
            $link = $emlak->find(".title a")[0]->href; //href loc
            $loction = "http://emlak.az";//href
            
            $htmlAlt = $dom->file_get_html($loction.$link);
            if($htmlAlt === false) dump("Alt Seife acilmir");

            $header     = $htmlAlt->find(".panel .title")[0]->innertext;
            $content    = $htmlAlt->find(".left-bar .desc")[0]->innertext;
            $amount     = $htmlAlt->find(".left-bar .price .m")[0]->plaintext;
            $date       = $htmlAlt->find(".box-panel .date strong")[0]->plaintext;
            $dates      = @$htmlAlt->find(".box-panel .date strong sdasd")[0]->plaintext;
            //$content    = $htmlAlt->find(".left-bar .desc")[0]->innertext;
            //$content    = $htmlAlt->find(".left-bar .desc")[0]->innertext;
            //$content    = $htmlAlt->find(".left-bar .desc")[0]->innertext;

            dump($header,$content,$amount,$date,$dates); exit();
        }*/
        
        //dump($emlaks);
        
        /*$errorLog = new ErrorLog("logs/pageErrors.log",500);

$errorLog->error("6");
dump($errorLog->errorCount);*/

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
