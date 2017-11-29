<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| connection_aborted(oid)ins the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Sites\HomeController@index')->name('home');
Route::get('/search', 'Sites\HomeController@searchAjax')->name('search');
Route::get('/admin', function() {
    return view('admin._component.test')->name('admin');
});
Route::group(['prefix' => 'admin', 'as' => 'admin.',  
    'namespace' => 'Admin'], function() {
        Route::resource('/user', 'AdminController');
        Route::post('/user/updateLevel', 'AdminController@updateLevel')->name('user.updateLevel');
        Route::post('/user/updateStatus', 'AdminController@updateStatus')->name('user.updateStatus');
        Route::get('/category', 'CategoryController@index')->name('category.index');
        Route::post('/category/updateStatus', 'CategoryController@updateStatus')->name('category.updateStatus');
        Route::post('/category/store', 'CategoryController@store')->name('category.store');
        Route::get('/category/search', 'CategoryController@search')->name('category.search');
        Route::get('/category/filter', 'CategoryController@filter')->name('category.filter');
        Route::get('/category/show', 'CategoryController@show')->name('category.show');
        Route::post('/category/update', 'CategoryController@update')->name('category.update');
        Route::resource('/province', 'ProvinceController');
        Route::post('/province/{id}', 'ProvinceController@update')->name('province.update');
        Route::resource('/service', 'ServiceController');
        Route::post('/service/{id}', 'ServiceController@update')->name('service.update');
        Route::resource('/plan', 'PlanController');
        Route::post('/plan', 'PlanController@store')->name('plan.store');
        Route::post('/plan/{id}', 'PlanController@update')->name('plan.update');
        Route::get('/request-service', 'RequestServiceController@index')->name('request.service');
        Route::post('/request-service/{id}', 'RequestServiceController@update')->name('request.service.update');
        Route::get('/request-service/search', 'RequestServiceController@search')->name('request.service.search');
        Route::get('/request-service/filter', 'RequestServiceController@filter')->name('request.service.filter');
});
Route::group(['namespace' => 'Admin'], function() {
    Route::get('/service/filter', 'ServiceController@filter');
    Route::get('/search/user', 'AdminController@search');
    Route::get('/province/search', 'ProvinceController@search');
    Route::get('/service/search', 'ServiceController@search');
    Route::get('/plan/search', 'PlanController@search');
    Route::get('/user/showData', 'AdminController@showData')->name('user.showData');
    Route::get('/request-service/showData', 'RequestServiceController@showData')->name('request.service.showData');
    Route::get('/province/showData', 'ProvinceController@showData')->name('province.showData');
    Route::get('/service/showData', 'ServiceController@showData')->name('service.showData');
    Route::get('/user/filter', 'AdminController@filter')->name('user.filter');
    Route::get('/plan/filter', 'PlanController@filter')->name('plan.filter');
    Route::get('/admin/profile/{id}', 'PlanController@profile')->name('admin.profile');
});

Route::group(['prefix' => 'account'], function () {
    Route::post('/register', 'LoginController@register')->name('register');
    Route::get('/login', 'LoginController@login')->name('login');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['prefix' => 'profile'], function () {
    Route::get('/', 'Sites\UserController@index')->name('user.profile');
    Route::post('/password/{id}', 'Sites\UserController@changePassword')->name('user.changePassword');
    Route::post('/avatar/{id}', 'Sites\UserController@changeAvatar')->name('user.changeAvatar');
    Route::post('/email/{id}', 'Sites\UserController@changeEmail')->name('user.changeEmail');
    Route::post('/{id}', 'Sites\UserController@updateProfile')->name('user.updateProfile');
    Route::post('/password/{id}', 'Sites\UserController@changePassword')->name('user.changePassword');
    Route::get('/setting', 'Sites\UserController@setting')->name('user.setting');
    Route::post('/email/{id}', 'Sites\UserController@changeEmail')->name('user.changeEmail');
    Route::post('/{id}', 'Sites\UserController@updateProfile')->name('user.updateProfile');
    Route::get('/setting', 'Sites\UserController@setting')->name('user.setting');
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/{id}', 'Sites\DashboardController@show')->name('user.dashboard');
});

Route::group(['prefix' => 'requestservice'], function () {
    Route::get('/', 'Sites\RequestServicesController@index')->name('user.request');
    Route::post('/', 'Sites\RequestServicesController@store')->name('user.storeRequest');
});

Route::group(['prefix' => 'schedule'], function () {
    Route::get('/{id}/add', 'Sites\CreateScheduleController@show')->name('user.schedule');
    Route::post('/update/{id}', 'Sites\CreateScheduleController@store')->name('schedule.postSchedule');
    Route::get('/result', 'AjaxController@getResult')->name('schedule.result');
    Route::get('/showservice', 'AjaxController@getService')->name('schedule.service');
});

Route::group(['prefix' => 'plan'], function () {
    Route::get('/', 'Sites\RequestPlanController@index')->name('user.plan');
    Route::post('/', 'Sites\RequestPlanController@store')->name('user.addplan');
    Route::get('/{id}/detail', 'Sites\RequestPlanController@show')->name('user.plan.detail');
    Route::resource('comment', 'CommentController');
    Route::post('/{id}/comment', 'CommentController@store')->name('use.plan.comment');
});
