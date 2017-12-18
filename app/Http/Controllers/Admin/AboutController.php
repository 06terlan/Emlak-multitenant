<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
    	$about = Storage::exists('about.txt') ? Storage::get('about.txt') : "";

        return view('admin.about.about',['about'=>$about]);
    }

    public function save(Request $request)
    {
    	if($request->has('content'))
    	{
    		Storage::put('about.txt',$request->input('content'));
    	}

		$about = Storage::exists('about.txt') ? Storage::get('about.txt') : "";

        return view('admin.about.about',['about'=>$about]);
    }
}
