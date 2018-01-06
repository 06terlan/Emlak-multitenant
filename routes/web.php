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

	//announcement
	Route::get('announcement', 'Admin\PostController@index')->name('announcement');
	Route::get('announcement/info/{announcement}', 'Admin\PostController@InfoAction')->where('announcement','[0-9]{1,}')->name('announcement_info');
    Route::group(['middleware' => 'admin'],function() {
        Route::get('announcement/delete/{id}', 'Admin\PostController@delete')->where('id','[0-9]{1,}')->name('announcement_delete');
    });

    //announcement
    Route::get('announcement_pro', 'Admin\ProController@index')->name('announcement_pro');
    Route::get('announcement_pro/info/{announcement}', 'Admin\ProController@InfoAction')->where('announcement','[0-9]{1,}')->name('announcement_pro_info');
    Route::group(['middleware' => 'admin'],function() {
        Route::get('announcement_pro/insert/{announcement}', 'Admin\ProController@inserEditAction')->where('announcement', '[0-9]{1,}')->name('announcement_insert');
        Route::post('announcement_pro/insert_act/{announcement}', 'Admin\ProController@inserEditK')->where('announcement', '[0-9]{1,}')->name('announcement_insert_act');
        Route::get('announcement_pro/delete/{announcement}', 'Admin\ProController@delete')->where('id', '[0-9]{1,}')->name('announcement_pro_delete');
        Route::get('announcement_pro/status/{announcement}', 'Admin\ProController@statusAction')->where('announcement','[0-9]{1,}')->name('announcement_pro_status');
    });

    //ajax
    Route::post('announcement/getLast', 'Admin\AjaxController@getLastAnnouncement')->name('getLastAnnouncementAjax');

});

/* frontend */
//homepage
Route::get('{home?}', function($home = ""){ return redirect('admin/home'); })->where('home','home');


Route::get('test', 'Admin\HomeController@test');