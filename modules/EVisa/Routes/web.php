<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['prefix' => 'e-visa', 'as' => 'e-visa.'], function () {
    Route::get('/applications/new', 'ApplicationController@create')->name('application.new');
    Route::post('/applications/new', 'ApplicationController@save')->name('application.new');
    Route::get('/guest/complete', 'ApplicationController@notifyGuest')->name('guest.complete');
    Route::get('/guest/return/{return_code}', 'ApplicationController@guestReturnFromEmail')->name('guest.email.return');
    Route::post('/guest/return/{return_code}', 'ApplicationController@continueFromEmail')->name('guest.continue');
});

