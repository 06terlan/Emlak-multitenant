<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Library\MyClass;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::realPost()->paginate( MyClass::ROW_COUNT );
    	return view('layouts.pages.home',['posts' => $posts]);
    }

    public function post($id)
    {
    	$post = Post::find($id);
    	return view('layouts.pages.post',['post' => $post]);
    }
}
