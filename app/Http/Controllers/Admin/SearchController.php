<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function indexAction(Request $request)
    {

        return view('admin.search.search');
    }
}
