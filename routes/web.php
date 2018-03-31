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
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'tenant'] ], function(){

	Route::get('{home?}', 'Admin\HomeController@home')->where('home','home')->name('home');
    Route::get('/lock', 'Admin\HomeController@lock')->name('lock');


	//dashboard
    Route::get('dashboard', 'Admin\HomeController@index')->where('dashboard','dashboard')->name('dashboard')->middleware('priv:dashboard,'.\App\Library\MyClass::PRIV_CAN_SEE);
	
	//profile
	Route::get('profile', 'Admin\ProfileController@index');
	Route::post('profile/{which}', 'Admin\ProfileController@update')->where('which','[12]');

    //password/profile
    Route::get('password', 'Admin\PasswordController@index');
    
    Route::post('password/{which}', 'Admin\PasswordController@password')->where('which','[12]');
	
	//users
	Route::get('users', 'Admin\UsersController@index')->name('users')->middleware('priv:users,'.\App\Library\MyClass::PRIV_CAN_SEE);
	Route::get('users/addEdit/{user}', 'Admin\UsersController@addEdit')->where('user','[0-9]{1,}')->name('user_add_edit')->middleware('priv:users,'.\App\Library\MyClass::PRIV_CAN_ADD);
	Route::post('users/addEdit/{user}', 'Admin\UsersController@addEditUser')->where('user','[0-9]{1,}')->middleware('priv:users,'.\App\Library\MyClass::PRIV_CAN_ADD);
	Route::get('users/delete/{user}', 'Admin\UsersController@delete')->where('user','[0-9]{1,}')->name('user_delete')->middleware('priv:users,'.\App\Library\MyClass::PRIV_CAN_ADD);

	//announcement
	Route::get('announcement', 'Admin\PostController@index')->name('announcement')->middleware('priv:announcement,'.\App\Library\MyClass::PRIV_CAN_SEE);
	Route::get('announcement/info/{announcement}', 'Admin\PostController@InfoAction')->where('announcement','[0-9]{1,}')->name('announcement_info')->middleware('priv:announcement,'.\App\Library\MyClass::PRIV_CAN_SEE);
	Route::get('announcement/delete/{announcement}', 'Admin\PostController@delete')->where('announcement','[0-9]{1,}')->name('announcement_delete')->middleware('priv:announcement,'.\App\Library\MyClass::PRIV_CAN_ADD);
    Route::get('announcement_pro/add/from/{announcement}', 'Admin\ProController@addFromAction')->where('announcement','[0-9]{1,}')->name('announcement_pro_add_from')->middleware('priv:announcement,'.\App\Library\MyClass::PRIV_CAN_ADD);
    Route::post('announcement_pro/insert_act/from/{announcement}', 'Admin\ProController@inserEditK2')->where('announcement', '[0-9]{1,}')->name('announcement_insert_act_from')->middleware('priv:announcement,'.\App\Library\MyClass::PRIV_CAN_ADD);

    //announcement pro
    Route::get('announcement_pro', 'Admin\ProController@index')->name('announcement_pro')->middleware('priv:announcement_pro,'.\App\Library\MyClass::PRIV_CAN_SEE);
    Route::get('announcement_pro/info/{announcement}', 'Admin\ProController@InfoAction')->where('announcement','[0-9]{1,}')->name('announcement_pro_info')->middleware('priv:announcement_pro,'.\App\Library\MyClass::PRIV_CAN_SEE);
    Route::get('announcement_pro/insert/{announcement}', 'Admin\ProController@inserEditAction')->where('announcement', '[0-9]{1,}')->name('announcement_insert')->middleware('priv:announcement_pro,'.\App\Library\MyClass::PRIV_CAN_ADD);
    Route::post('announcement_pro/insert_act/{announcement}', 'Admin\ProController@inserEditK')->where('announcement', '[0-9]{1,}')->name('announcement_insert_act')->middleware('priv:announcement_pro,'.\App\Library\MyClass::PRIV_CAN_ADD);
    Route::get('announcement_pro/delete/{announcement}', 'Admin\ProController@delete')->where('id', '[0-9]{1,}')->name('announcement_pro_delete')->middleware('priv:announcement_pro,'.\App\Library\MyClass::PRIV_CAN_ADD);
    Route::get('announcement_pro/status/{announcement}', 'Admin\ProController@statusAction')->where('announcement','[0-9]{1,}')->name('announcement_pro_status')->middleware('priv:announcement_pro,'.\App\Library\MyClass::PRIV_CAN_ADD);


    //tenants
    Route::get('tenants', 'Admin\TenantController@index')->name('tenant')->middleware('priv:tenant,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_SEE);
    Route::get('tenant/addEdit/{tenant}', 'Admin\TenantController@addEdit')->where('tenant','[0-9]{1,}')->name('tenant_add_edit')->middleware('priv:tenant,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD);
    Route::post('tenant/addEdit/{tenant}', 'Admin\TenantController@addEditTenant')->where('tenant','[0-9]{1,}')->name('tenant_add_edit_act')->middleware('priv:tenant,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD);
    Route::get('tenant/delete/{tenant}', 'Admin\TenantController@delete')->where('tenant','[0-9]{1,}')->name('tenant_delete')->middleware('priv:tenant,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD);
    Route::get('tenant/payment/{tenant}', 'Admin\TenantController@payment')->where('tenant','[0-9]{1,}')->name('tenant_payment')->middleware('priv:tenant,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD);
    Route::post('tenant/payment/{tenant}', 'Admin\TenantController@payment_action')->where('tenant','[0-9]{1,}')->name('tenant_payment_action')->middleware('priv:tenant,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD);

    //search
    Route::get('search', 'Admin\SearchController@indexAction')->name('search')->middleware('priv:search,'.\App\Library\MyClass::PRIV_CAN_SEE);

    //map
    Route::get('map', 'Admin\SearchController@mapAction')->name('map')->middleware('priv:map,'.\App\Library\MyClass::PRIV_CAN_SEE);

    //report
    Route::get('report/announcement_graphic_report', 'Admin\ReportController@announcementGraphicReportAction')->name('report_announcement_graphic_report')->middleware('priv:report_announcement_graphic_report,'.\App\Library\MyClass::PRIV_CAN_SEE);

    //msk
    Route::get('msk/makler', 'Admin\MSKController@makler')->name('msk_makler')->middleware('priv:msk_makler,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_SEE);
    Route::any('msk/makler/addEdit/{makler}', 'Admin\MSKController@maklerAddEdit')->where('makler', '[0-9]{1,}')->name('msk_makler_add_edit')->middleware('priv:msk_makler,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD);
    Route::get('msk/makler/delete/{makler}', 'Admin\MSKController@maklerDelete')->where('makler', '[0-9]{1,}')->name('msk_makler_delete')->middleware('priv:msk_makler,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD);

    Route::get('msk/group', 'Admin\MSKController@group')->name('msk_group')->middleware('priv:msk_group,'.\App\Library\MyClass::PRIV_CAN_SEE);
    Route::any('msk/group/addEdit/{group}', 'Admin\MSKController@groupAddEdit')->where('group', '[0-9]{1,}')->name('msk_group_add_edit')->middleware('priv:msk_group,'.\App\Library\MyClass::PRIV_CAN_ADD);
    Route::get('msk/group/delete/{group}', 'Admin\MSKController@groupDelete')->where('group', '[0-9]{1,}')->name('msk_group_delete')->middleware('priv:msk_group,'.\App\Library\MyClass::PRIV_CAN_ADD);

    Route::get('msk/metro', 'Admin\MSKController@metro')->name('msk_metro')->middleware('priv:msk_metro,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_SEE);
    Route::any('msk/metro/addEdit/{metro}', 'Admin\MSKController@metroAddEdit')->where('metro', '[0-9]{1,}')->name('msk_metro_add_edit')->middleware('priv:msk_metro,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD);
    Route::get('msk/metro/delete/{metro}', 'Admin\MSKController@metroDelete')->where('metro', '[0-9]{1,}')->name('msk_metro_delete')->middleware('priv:msk_metro,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD);

    Route::get('msk/city', 'Admin\MSKController@city')->name('msk_city')->middleware('priv:msk_city,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_SEE);
    Route::any('msk/city/addEdit/{city}', 'Admin\MSKController@cityAddEdit')->where('city', '[0-9]{1,}')->name('msk_city_add_edit')->middleware('priv:msk_city,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD);
    Route::get('msk/city/delete/{city}', 'Admin\MSKController@cityDelete')->where('city', '[0-9]{1,}')->name('msk_city_delete')->middleware('priv:msk_city,'.\App\Library\MyClass::PRIV_SUPER_ADMIN_CAN_ADD);

    Route::get('msk/type', 'Admin\MSKController@type')->name('msk_type')->middleware('priv:msk_type,'.\App\Library\MyClass::PRIV_CAN_SEE);
    Route::any('msk/type/addEdit/{type}', 'Admin\MSKController@typeAddEdit')->where('type', '[0-9]{1,}')->name('msk_type_add_edit')->middleware('priv:msk_type,'.\App\Library\MyClass::PRIV_CAN_ADD);
    Route::get('msk/type/delete/{type}', 'Admin\MSKController@typeDelete')->where('type', '[0-9]{1,}')->name('msk_type_delete')->middleware('priv:msk_type,'.\App\Library\MyClass::PRIV_CAN_ADD);

    //ajax
    Route::post('announcement/getLast', 'Admin\AjaxController@getLastAnnouncement')->name('getLastAnnouncementAjax');

});

/* frontend */
//homepage
Route::get('{home?}', function($home = ""){ return redirect('admin/home'); })->where('home','home');


Route::get('test', 'Admin\HomeController@test');