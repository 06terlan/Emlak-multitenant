<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Models\Contact;
use App\Models\Post;
use App\Library\Date;

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
        $data = 
        [
            'total_users'       => User::count(),
            'admin_users'       => User::where('role',1)->count(),
            'author_users'      => User::where('role',0)->count(),
            'all_contacts'      => Contact::realContact()->count(),
            'not_read_contacts' => Contact::NotRead()->count(),
            'read_contacts'     => Contact::realContact()->where('read',1)->count(),
            'posts'             => json_encode($this->getPostsChartData(),true),
            'user_sharings'     => json_encode($this->getPostsUserSharingChartData(),true),
        ];
        return view( 'admin.home' , $data );
    }

    private function getPostsChartData()
    {
        $qroups = [];
        $posts = Post::realPost()->whereYear('created_at', '=', Date::year())
                ->get();

        foreach ($posts as $post)
        {
            if( !isset( $qroups[Date::d($post['created_at'],'F')] ) ) $qroups[Date::d($post['created_at'],'F')] = 0;
            $qroups[Date::d($post['created_at'],'F')] ++;
        }

        $data = [
                'labels' => array_keys($qroups),
                'datasets' => [[
                    'label' => 'Posts',
                    'data' => array_values($qroups),
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ]
                ]]
            ];

        return $data;
    }

    private function getPostsUserSharingChartData()
    {
        $qroups = [];
        $posts = Post::realPost()
                ->get();

        foreach ($posts as $post)
        {
            if( !isset( $qroups[ $post->author->fullname() ] ) ) $qroups[ $post->author->fullname() ] = 0;
            $qroups[ $post->author->fullname() ] ++;
        }

        $data = [
                'labels' => array_keys($qroups),
                'datasets' => [[
                    'label' => 'Posts',
                    'data' => array_values($qroups),
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ]
                ]]
            ];

        return $data;
    }

}
