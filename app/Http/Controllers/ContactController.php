<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
   	public function index()
    {
    	return view('layouts.pages.contact');
    }

    public function save(Request $request)
    {
    	$contact 			= new Contact();
    	$contact->name 		= $request->input('name');
    	$contact->email 	= $request->input('email');
    	$contact->phone 	= $request->input('phone');
    	$contact->message 	= $request->input('message');

    	$contact->save();

    	return redirect('contact')->with('status', 'Profile updated!');
    }
}
