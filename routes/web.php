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


Route::get('notes', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', 'LandingPageController@index')->name('welcome');
Route::get('/faq', 'LandingPageController@faq')->name('faq');
Route::get('/eligibility', 'LandingPageController@eligibility')->name('eligibility');
Route::get('auth/sso', 'Auth\SsoController@ssoRedirect')->name('auth.sso_redirect');
Route::get('auth/sso/authorize', 'Auth\SsoController@authorizeSso')->name('auth.sso_authorize');


Auth::routes();

Route::get('/home', 'FrontendController@index')->name('home');

Route::get('/frontend', 'FrontendController@index')->name('frontend');

Route::group(['prefix' => 'applications', 'namespace' => 'Frontend', 'as' => 'frontend.', 'middleware' => ['auth']], function (){
    Route::get('/', 'ApplicationController@myApplications')->name("applications.index");
});

/*
 * Backend routes
 */
Route::group(['prefix' => 'backend', 'namespace' => 'Backend', 'as' => 'backend.', 'middleware' => ['backend']], function () {
    Route::get('', 'DashboardController@index');

    Route::group(['prefix' => 'modules', 'as' => 'modules.'], function () {
        Route::get("", 'ModuleController@index')->name("index");
        Route::get("{module}/manage", "ModuleController@show")->name("manage");
        Route::get("{module}/users", "ModuleController@users")->name("users");
        Route::get("{module}/users/add", "ModuleController@addUser")->name("add_user");
        Route::post("{module}/users/add", "ModuleController@storeUser")->name("add_user");
        Route::get("{module}/users/{user}", "ModuleController@editUser")->name("edit_user");
        Route::post("{module}/users/{user}", "ModuleController@updateUserPermissions")->name("update_user");
        Route::get("{module}/users/{user}/remove", "ModuleController@removeUser")->name("remove_user");
    });

    Route::group(['prefix' => '{module}'], function () {
        Route::group(['prefix' => 'applications', 'as' => 'applications.'], function () {
            Route::get('', 'ApplicationController@indexModuleApplications')->name('index');
            Route::get('{application_id}/details', 'ApplicationController@viewModuleApplication')->name('show');
        });

        Route::group(['prefix' => 'tasks', 'as' => 'tasks.'], function () {
            Route::get('', 'TaskController@myQueue')->name('queue');
            Route::get('pick', 'TaskController@pickTask')->name('pick');
            Route::get('inbox', 'TaskController@myInbox')->name('inbox');
            Route::get('outbox', 'TaskController@myOutbox')->name('outbox');
            Route::get('corrections', 'TaskController@myInCorrection')->name('corrections');
            Route::get('{task}/view', 'TaskController@show')->name('show');
            Route::post('{task}/view', 'TaskController@handleTask')->name('submit');
        });

        Route::group(['prefix' => 'ouputs', 'as' => 'outputs.'], function () {
            Route::get('', 'OutputController@index')->name('index');
            Route::get('new', 'OutputController@create')->name('new');
            Route::post('new', 'OutputController@store')->name('store');
            Route::get('{output}/preview', 'OutputController@show')->name('show');
            Route::get('{output}/edit', 'OutputController@edit')->name('edit');
            Route::post('{output}/edit', 'OutputController@update')->name('update');
        });
    });

    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');

    Route::group(['prefix' => 'users/{user}/roles', 'as' => 'users.roles.'], function(){
        Route::get('edit', 'UsersController@editRoles')->name('edit');
        Route::post('update', 'UsersController@updateRoles')->name('update');
    });

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::get('','SettingsController@generalSettings')->name('general');
        Route::post('','SettingsController@saveGeneralSettings')->name('general');
    });


});

Route::prefix('applications/{module_slug}')
    ->namespace('Frontend')
    ->group(function () {
        Route::get('/{application}', 'ApplicationController@show')->name('application.show');
        Route::get('/{application_id}/download/{application_output}', 'ApplicationController@downloadOutput')->name('application.download');

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