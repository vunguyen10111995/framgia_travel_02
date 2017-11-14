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
});
Route::get('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::post('/register', 'LoginController@register')->name('register');
