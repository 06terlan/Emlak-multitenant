<?php

namespace App\Http\Controllers\Admin;

use App\Models\Announcement;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Library\MyClass;

class PostController extends Controller
{
    public function index()
    {
        $announcements = Announcement::realPost()->paginate( MyClass::ADMIN_ROW_COUNT );
        return view('admin.post.announcements',['announcements' => $announcements]);
    }

    public function addEdit($id)
    {
    	$dataToBlade = [
    		'id'	=> $id,
            'Post' 	=> Post::find($id)
        ];

        return view('admin.post.postAddEdit',$dataToBlade);
    }

    public function delete($id)
    {
        $post = Announcement::find($id);
        $post->deleted = 1;
        $post->save();
        
        return redirect()->route("announcement");
    }
}
