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
    return view('auth.login');
});

Route::post('/','AuthController@authenticate')->name('auth.authenticate');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => ['role:super-admin']], function () {

        Route::resource('roles','RolesController');

        Route::resource('users', 'UsersController');

    });

    Route::resource('cases', 'CaseDetailsController');

    Route::get('/profile', [
        'uses' => 'UsersController@profile',
        'as' => 'users.profile'
    ]);

    Route::get('/logout','AuthController@logout')->name('auth.logout');

    Route::get('city/get/{id}', [
       'uses' => 'HomeController@getCity',
       'as' => 'get.city'
    ]);

    Route::post('/cases/assign/{case}', [
        'uses' => 'CaseDetailsController@assign',
        'as' => 'cases.assign'
    ]);

    Route::get('/cases/approve/{case}', [
        'uses' => 'CaseDetailsController@approve',
        'as' => 'cases.approve'
    ]);

    Route::post('/cases/investigation/{case}', [
        'uses' => 'CaseDetailsController@investigation',
        'as' => 'cases.investigation'
    ]);

    Route::get('/reports', [
        'uses' => 'ReportsController@index',
        'as' => 'reports.index'
    ]);

    Route::get('/reports/general/{id}', [
        'uses' => 'ReportsController@general',
        'as' => 'reports.general'
    ]);

    Route::get('/reports/export/excel/{id}', [
        'uses' => 'ReportsController@excelReport',
        'as' => 'reports.excel'
    ]);

    Route::get('/reports/export/pdf/{id}', [
        'uses' => 'ReportsController@pdfReport',
        'as' => 'reports.pdf'
    ]);

    Route::post('/reports/custom', [
        'uses' => 'ReportsController@custom',
        'as' => 'reports.custom'
    ]);

    Route::get('/reports/custom/excel/{from}/{to}', [
        'uses' => 'ReportsController@excelCustom',
        'as' => 'reports.excelCustom'
    ]);



});
