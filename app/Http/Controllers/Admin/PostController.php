<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewPostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Library\MyClass;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::realPost()->paginate( MyClass::ADMIN_ROW_COUNT );
        return view('admin.post.posts',['posts' => $posts]);
    }

    public function addEdit($id)
    {
    	$dataToBlade = [
    		'id'	=> $id,
            'Post' 	=> Post::find($id)
        ];

        return view('admin.post.postAddEdit',$dataToBlade);
    }

    public function addEditPost(NewPostRequest $request)
    {
        if($request->input('id') == 0)
        {
            $post                   = new Post();
            $post->user_id          = Auth::user()->id;
            $post->header           = $request->input('header');
            $post->short_content    = $request->input('short_content');
            $post->content          = $request->input('content');

            $post->save();
        }
        else
        {
            $post                   = Post::find( $request->input('id') );;
            $post->user_id          = Auth::user()->id;
            $post->header           = $request->input('header');
            $post->short_content    = $request->input('short_content');
            $post->content          = $request->input('content');

            $post->save();
        }

        return redirect("admin/posts");
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->deleted = 1;
        $post->save();
        
        return redirect("admin/posts");
    }
}
