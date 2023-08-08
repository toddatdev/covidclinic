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

use Illuminate\Support\Facades\Route;

if (substr(url()->current(), strpos(url()->current(), '/l'), 6) === '/login' && request()->method() === 'GET') {
    abort(404);
}

Route::get('/', 'WebController@index')->middleware('guest')->name('index');

Route::middleware('auth')->group(function() {

    Route::get('/welcome', 'WebController@welcome')->name('root');

    Route::resource('patient-information', 'PatientInformationController');

    Route::resource('facility-information', 'FacilityTestCollectionController');

    Route::resource('result', 'ReportResultController');

    Route::resource('medical-result', 'MedicalTestResultController');

});

Route::get('report', 'WebController@printResult')->name('report');

Route::get('getAddress/{selected_id}', 'WebController@getAddress')->name('getAddress');


//Admin Dashboar Routes

 Route::prefix('admin')->middleware('auth')->group(function(){

         Route::resource('/dashboard', 'AdminController');
         Route::resource('facility-info', 'FacilityInformationController');
         Route::resource('test-names', 'TestNameController');
         Route::resource('test-devices', 'TestDeviceController');
         Route::resource('report-descriptions', 'ReportController');
         Route::resource('report-footer-details', 'ReportFooterDetailController');
         Route::resource('upload-sign-image', 'SignController');
         Route::resource('facility-location', 'FacilityReportInfoController');
         Route::resource('test-possibilities', 'TestPossibilityController');



//     Route::get('/live_search/action', 'FacilityReportInfoController@action')->name('live_search.action');


 });

Auth::routes(['register'=>false]);

//Route::get('/home', 'HomeController@index')->name('home');
