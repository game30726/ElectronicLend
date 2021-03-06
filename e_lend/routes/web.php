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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::resource('user/lend', 'user\lendController');
    Route::get('user/home', 'user\lendController@index');
    Route::get('user/form', 'user\lendController@edit');
    Route::get('user/update', 'user\lendController@update');
    Route::get('user/order', 'user\lendController@show');
    });
//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::resource('/admin', 'admin\AdminController');
        Route::get('/dashboard', 'admin\AdminController@index');
        Route::post('/store', 'admin\AdminController@store');
        Route::get('/update', 'admin\AdminController@update');
        Route::get('/edit', 'admin\AdminController@edit');
    });
});