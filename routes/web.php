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

Route::get('/frontend', 'FrontendController@index')->name('frontend');

/*
 * Backend routes
 */
Route::prefix('backend')
    ->namespace('Backend')
    ->group(function(){
        Route::get('', 'DashboardController@index')->name('backend');
        Route::get('tasks', 'ModuleController@index')->name('backend.modules.index');

    });



Route::prefix('applications/{module_slug}')
    ->namespace('Frontend')
    ->group(function () {
        Route::get('/new', 'ApplicationController@create')->name('application.create');
        Route::post('/create', 'ApplicationController@save')->name('application.save');
        Route::get('/{application}/edit', 'ApplicationController@edit')->name('application.edit');
        Route::get('/{application}/review', 'ApplicationController@review')->name('application.review');
    });

/*
 * Payment manager urls
 *
 */
Route::get('payment-success', 'PaymentController@paymentSuccess')->name('payment.success');
Route::get('payment-failed', 'PaymentController@paymentFailed')->name('payment.failed');

