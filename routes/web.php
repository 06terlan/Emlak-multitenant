<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* Admin panel */
Auth::routes();
Route::group(['prefix' => 'admin' , 'middleware' => 'auth' ], function(){

	//dashboard
	Route::get('{home?}', 'Admin\HomeController@index')->where('home','home');
	
	//profile
	Route::get('profile', 'Admin\ProfileController@index');
	Route::post('profile/{which}', 'Admin\ProfileController@update')->where('which','[12]');
	
	//users
	Route::group(['middleware' => 'admin'],function(){
		Route::get('users', 'Admin\UsersController@index');
		Route::get('users/addEdit/{id}', 'Admin\UsersController@addEdit')->where('which','[0-9]{1,}');
		Route::post('users/addEdit/{id}', 'Admin\UsersController@addEditUser')->where('which','[0-9]{1,}');
		Route::get('users/delete/{id}', 'Admin\UsersController@delete')->where('which','[0-9]{1,}');
	});

	//post
	Route::get('announcement', 'Admin\PostController@index')->name('announcement');
	Route::get('announcement/info/{id}', 'Admin\PostController@InfoAction')->where('which','[0-9]{1,}')->name('announcement_info');
    Route::get('announcement/delete/{id}', 'Admin\PostController@delete')->where('which','[0-9]{1,}')->name('announcement_delete');
	//Route::post('posts/addEdit/{id}', 'Admin\PostController@addEditPost')->where('which','[0-9]{1,}');

});

/* frontend */
//homepage
Route::get('{home?}', function($home = ""){ return redirect('admin/home'); })->where('home','home');


Route::get('test', 'Admin\HomeController@test');