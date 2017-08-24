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
Route::get('auth/sso/authorize','Auth\SsoController@authorizeSso')->name('auth.sso_authorize');

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
        Route::group(['prefix' => 'tasks'], function(){
            Route::get('', 'TaskController@index')->name('backend.tasks.index');

            Route::group(['prefix' => '{module}'], function (){
                Route::get('', 'TaskController@myQueue')->name('backend.tasks.queue');
                Route::get('pick', 'TaskController@pickTask')->name('backend.tasks.pick');
                Route::get('inbox', 'TaskController@myInbox')->name('backend.tasks.inbox');
                Route::get('outbox', 'TaskController@myOutbox')->name('backend.tasks.outbox');
                Route::get('corrections', 'TaskController@myInCorrection')->name('backend.tasks.corrections');
                Route::get('{task}/view', 'TaskController@show')->name('backend.tasks.show');
                Route::post('{task}/view', 'TaskController@handleTask')->name('backend.tasks.submit');
            });
        });
    });



Route::prefix('applications/{module_slug}')
    ->namespace('Frontend')
    ->group(function () {
        Route::get('/new', 'ApplicationController@create')->name('application.create');
        Route::post('/create', 'ApplicationController@save')->name('application.save');
        Route::get('/{application}/edit', 'ApplicationController@edit')->name('application.edit');
        Route::get('/{application}/review', 'ApplicationController@review')->name('application.review');
        Route::get('/{application}/checkout/{invoice_pk}', 'ApplicationController@checkout')->name('application.checkout');
        Route::post('/{application}/submit', 'ApplicationController@submit')->name('application.review.submit');
        Route::get('/{application}/submitted', 'ApplicationController@submitted')->name('application.submitted');
    });

/*
 * Payment manager urls
 *
 */
Route::get('payment-success', 'PaymentController@paymentSuccess')->name('payment.success');
Route::get('payment-failed', 'PaymentController@paymentFailed')->name('payment.failed');

