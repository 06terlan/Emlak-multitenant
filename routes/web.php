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
	Route::get('posts', 'Admin\PostController@index');
	Route::get('posts/addEdit/{id}', 'Admin\PostController@addEdit')->where('which','[0-9]{1,}');
	Route::post('posts/addEdit/{id}', 'Admin\PostController@addEditPost')->where('which','[0-9]{1,}');
	Route::get('posts/delete/{id}', 'Admin\PostController@delete')->where('which','[0-9]{1,}');

	//about
	Route::get('about', 'Admin\AboutController@index');
	Route::post('about', 'Admin\AboutController@save');

	//contact
	Route::get('contacts', 'Admin\ContactController@index');
	Route::get('contacts/delete/{id}', 'Admin\ContactController@delete')->where('which','[0-9]{1,}');
	Route::get('contacts/{id}', 'Admin\ContactController@info')->where('which','[0-9]{1,}');
});

/* frontend */
//homepage
Route::get('{home?}', 'HomeController@index')->where('home','home');

//about
Route::get('/about', 'AboutController@index');

//post
Route::get('/post/{which?}', 'HomeController@post')->where('which','[0-9]{1,}');

//contact
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@save');