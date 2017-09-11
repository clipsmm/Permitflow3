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

Route::post('auth/login', 'Auth\ApiAuthController@login');

Route::group(['middleware' => ['jwt.auth', 'jwt.refresh']], function(){
    //put routes that require api authentication here
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('upload-image',"MediaController@updatePhotoCrop");

Route::get('payment-notification', 'PaymentController@paymentNotification')->name('payment.notification');
