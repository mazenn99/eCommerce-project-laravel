<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'guest:admin'] , function() {
   Route::get('login' , 'LoginController@login')->name('admin.login.view');
   Route::post('login' , 'LoginController@checkLogin')->name('admin.login.check');
});

Route::group(['middleware' => 'auth:admin'] , function() {
   Route::get('/' , 'DashboardController@index')->name('admin.dashboard');
});
