<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
		$about = Storage::exists('about.txt') ? Storage::get('about.txt') : "";
    	
    	return view('layouts.pages.about',['about'=>$about]);
    }
}
