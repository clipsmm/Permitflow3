<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/e-visa', function (Request $request) {
    // return $request->e-visa();
})->middleware('auth:api');

Route::group(['middleware' => ['jwt.auth', 'jwt.refresh']], function(){
    //put routes that require jwt authentication here
    Route::post('visa', 'CheckInController@getVisaDetails');
    Route::post('checkin', 'CheckInController@checkin');
});
