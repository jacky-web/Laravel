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

Route::get('/vendor-reg',function () {
    return view('vendor-reg');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/vendor_login','Auth\LoginController@index')->name('vendor.login.step1');



