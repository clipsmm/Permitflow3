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

Route::get('auth/sso','Auth\SsoController@ssoRedirect')->name('auth.sso_redirect');
Route::get('auth/sso/authorize','Auth\SsoController@ssoRedirect')->name('auth.sso_authorize');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
