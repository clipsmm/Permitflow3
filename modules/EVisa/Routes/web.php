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
    Route::get('requirements','ApplicationController@getRequirements')->name('requirements');
    Route::get('retrieve', 'ApplicationController@getExistingApplication')->name('retrieve_existing');
    Route::post('retrieve', 'ApplicationController@retrieveExistingApplication')->name('retrieve_existing.submit');

    Route::get('/applications/new', 'ApplicationController@create')->name('application.new');
    Route::post('/applications/new', 'ApplicationController@save')->name('application.new');

    Route::get('/guest/complete', 'ApplicationController@completeGuestApplication')->name('guest.complete');
    Route::get('/guests/{return_code}/retrieve', 'ApplicationController@retrieveGuestApplication')->name('guest.retrieve');
    Route::post('/guests/{return_code}/retrieve', 'ApplicationController@resumeGuestApplication')->name('guest.resume');
    Route::post('/guests/complete/resend-email', 'ApplicationController@resendEmail')->name('guest.resend_email');

    Route::get('/applications/{application}/edit', 'ApplicationController@edit')->name('application.edit');
    Route::post('/applications/{application}/update', 'ApplicationController@update')->name('application.update');

    Route::get('backend/settings', 'SettingsController@allSettings')->name('settings.all')->middleware('backend');
    Route::post('backend/settings', 'SettingsController@saveSettings')->name('settings.save')->middleware('backend');
});

