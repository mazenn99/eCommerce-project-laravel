<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
| // note there is prefix (admin) in RouteServiceProvider file and language
| localization middleware and prefix
| look to this function mapAdminRoutes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'guest:admin' , 'prefix' => 'admin'] , function() {
   Route::get('login' , 'authController@login')->name('admin.login.view');
   Route::post('login' , 'authController@checkLogin')->name('admin.login.check');
});

Route::group(['middleware' => 'auth:admin' , 'prefix' => 'admin'] , function() {
   Route::get('/' , 'DashboardController@index')->name('admin.dashboard');
    // admin logout //
    Route::post('logout' , 'authController@logout')->name('admin.logout');
    // shipped controller //
    Route::group(['prefix' => 'settings'] , function() {
        Route::get('shipped-methods/{type}' , 'SettingsController@editShippingMethods')->name('edit.shipped.methods');
        Route::put('shipped-methods/{id}' , 'SettingsController@updateShippingMethods')->name('update.shipped.methods');
    });
    // edit profile //
    Route::group(['prefix' => 'profile'] , function() {
        Route::get('edit' , 'ProfileController@editProfile')->name('edit.admin.profile');
        Route::put('edit' , 'ProfileController@updateProfile')->name('update.admin.profile');

    });
});

