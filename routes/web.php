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
});
Route::get('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::post('/register', 'LoginController@register')->name('register');
Route::get('/search/user', 'Admin\AdminController@search');
Route::get('/user/showData', 'Admin\AdminController@showData')->name('user.showData');
Route::get('/user/filter', 'Admin\AdminController@filter')->name('user.filter');
Route::get('/profile', 'Sites\UserController@index')->name('user.profile');
Route::post('/profile/avatar/{id}', 'Sites\UserController@changeAvatar')->name('user.changeAvatar');
Route::post('/profile/password/{id}', 'Sites\UserController@changePassword')->name('user.changePassword');
Route::post('/profile/email/{id}', 'Sites\UserController@changeEmail')->name('user.changeEmail');
Route::post('/profile/{id}', 'Sites\UserController@updateProfile')->name('user.updateProfile');
Route::get('/profile/setting', 'Sites\UserController@setting')->name('user.setting');
