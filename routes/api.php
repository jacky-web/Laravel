<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('vendor_reg','VendorController@create')->name('vendor.form.submit');

Route::post('health','HealthDeclaritionController@create');

Route::post('vendor_login','Auth\LoginController@login')->name('vendor.login.step1.submit');

Route::get('vendor_login-step2','Auth\LoginController@indextwo')->name('vendor.login.step2');

Route::post('vendor_login-step2','Auth\LoginController@loginbyotp')->name('vendor.login.step2.submit');

Route::get('vendor_dashbord/{vendor_id}','Auth\LoginController@vendor_dashbord')->name('vendor.dashbord');