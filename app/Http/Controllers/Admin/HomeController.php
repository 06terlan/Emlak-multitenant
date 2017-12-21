<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Models\Contact;
use App\Models\Post;
use App\Library\Date;

use App\Library\Dom\Dom;
use App\Library\ErrorLog;

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
        $dom = new Dom();
        $html = $dom->file_get_html('http://emlak.az/elanlar/?ann_type=1&tip[]=3');
        
        if($html === false) dump("Seife acilmir");

        $emlaks = $html->find('div.ticket-list .ticket'); //all emlak
        foreach ($emlaks as $emlak)
        {
            $link = $emlak->find(".title a")[0]->href; //href loc
            $loction = "http://emlak.az";//href
            
            $htmlAlt = $dom->file_get_html($loction.$link);
            if($htmlAlt === false) dump("Alt Seife acilmir");


            dump($htmlAlt); exit();
        }
        
        //dump($emlaks);
        
        /*$errorLog = new ErrorLog("logs/pageErrors.log",500);

$errorLog->error("6");
dump($errorLog->errorCount);*/
        return "sad";
    }

}
