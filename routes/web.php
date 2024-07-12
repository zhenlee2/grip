<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;




Route::get('/', function () {
    return redirect()->route('home');
})->name('/');

Route::get('login', 'LoginController@index')->name('login');
Route::get('home', 'HomeController@index')->name('home');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::post('auth/login', 'AuthController@login_request')->name('auth.login');
Route::get('auth/logout', 'AuthController@logout_request')->name('auth.logout');

//PAGES

//PERFORMANCE CONTRACT
Route::prefix('performance_contract')->group(function () {
    Route::get('office', 'CreateofficeController@createpc')->name('createpc');
    Route::get('office/{year}/{semester}', 'CreateofficeController@showpc')->name('showpc');
    Route::get('individual', 'OfficeController@individual')->name('individual');
    Route::post('save_indicator', 'CreateofficeController@save_indicator');
    Route::post('update_indicator', 'ShowopcController@update_indicator');
    Route::post('delete_indicator', 'ShowopcController@delete_indicator');
});

//PERFORMANCE CONTRACT REVIEW
Route::prefix('performance_contract_review')->group(function () {
    Route::get('office', 'OfficereviewController@index')->name('office');
    Route::get('officereview/{year}/{semester}', 'OfficereviewController@showpcr')->name('officereview');
    // Route::get('individual', 'OfficeController@individual')->name('individual');
    Route::post('save_rating', 'OfficereviewController@save_rating');
    Route::post('update_rating', 'Showopcr@update_rating');
    });

    Route::get('divisionreview', 'DivisionreviewController@index')->name('divisionreview');
// Route::post('/update-indicator/{id}', [PcController::class, 'update_indicator']);

Route::prefix('gender_and_development')->group(function () {
    Route::get('gad', 'GenderDevelopmentController@index')->name('gad');
    Route::get('gmef', 'GmefController@index')->name('gmef');
    Route::get('gadgpb', 'GadgpbController@index')->name('gadgpb');
    Route::post('gadgpb/upload', 'GadgpbController@upload')->name('gadgpb.upload');
    Route::get('gadar/{year}/{quarter}', 'GadarController@index')->name('gadar.year.quarter');
    Route::get('gadar', 'GadarController@index')->name('gadar');
    Route::post('gadar/upload', 'GadarController@upload')->name('gadar.upload');
    Route::post('gadar/save', 'GadarController@save')->name('gadar.save');
    Route::post('gadar/verify', 'GadarController@verify')->name('gadar.verify');
    Route::post('gadar/submit', 'GadarController@submit')->name('gadar.submit');
    Route::get('gadar/export/{year}/{quarter}', 'GadarController@export')->name('gadar.export');
    // Route::get('officereview/{year}/{semester}', 'CreateofficeController@showpcr')->name('officereview');
    // Route::get('divisionreview', 'DivisionreviewController@index')->name('divisionreview');
    });

    Route::get('/gadar-pdf', 'PDFController@generatePDF')->name('gadar-pdf');
    // Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);
//Show OPC
// Route::get('/opcpage/showopc', 'ShowopcController@index')->name('show');

//LIBRARIES
Route::get('activity', 'ActivityController@index')->name('activity');
Route::get('offices', 'OfficesController@index')->name('offices');
Route::get('indicator', 'IndicatorController@index')->name('indicator');
Route::get('division', 'DivisionController@index')->name('division');
Route::get('section', 'SectionController@index')->name('section');

//Activity Controller
// Route::get('get_activity', 'ActivityController@list');
// Route::post('store_activity', 'ActivityController@store');
// Route::post('update_activity', 'ActivityController@update');
// Route::post('delete_activity', 'ActivityController@delete');

//Offices Controller
// Route::get('get_offices', 'OfficesController@list');
// Route::post('store_offices', 'OfficesController@store');
// Route::post('update_offices', 'OfficesController@update');
// Route::post('delete_offices', 'OfficesController@delete');

//Section Controller
Route::get('get_section', 'SectionController@list');
Route::post('store_section', 'SectionController@store');
Route::post('update_section', 'SectionController@update');
Route::post('delete_section', 'SectionController@delete');

//Division Controller
Route::get('get_division', 'DivisionController@list');
Route::post('store_division', 'DivisionController@store');
Route::post('update_division', 'DivisionController@update');
Route::post('delete_division', 'DivisionController@delete');

Route::get('get_account', 'AccountController@list');
Route::post('store_account', 'AccountController@store');
Route::post('update_account', 'AccountController@update');
Route::post('delete_account', 'AccountController@delete');

//Category Controller
Route::get('get_category', 'CategoryController@list');

Route::get('print/{year}/{semester}', 'PrintController@index')->name('print');
Route::get('users', 'UserController@index')->name('users');
Route::get('profile', 'UserController@index1')->name('profile');

Route::get('get_countindicator', 'DashboardController@PCindicatorcount');

//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'de', 'es','fr','pt', 'cn', 'ae'])) {
        abort(400);
    }   
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');

Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax'], function () {
    Route::get('get_activity/{id}', 'PcController@get_activity');
    Route::get('get_indicator/{id}', 'PcController@get_indicator');
    // Route::get('get_office/{id}', 'PcController@get_office');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('users', 'UserController@index')->name('users');
    
});

    
// Route::prefix('dashboard')->group(function () {
//     Route::view('index', 'dashboard.index')->name('index');
//     Route::view('dashboard-02', 'dashboard.dashboard-02')->name('dashboard-02');
// });

// Route::prefix('page-layouts')->group(function () {
//     Route::view('box-layout', 'page-layout.box-layout')->name('box-layout');    
//     Route::view('layout-rtl', 'page-layout.layout-rtl')->name('layout-rtl');    
//     Route::view('layout-dark', 'page-layout.layout-dark')->name('layout-dark');    
//     Route::view('hide-on-scroll', 'page-layout.hide-on-scroll')->name('hide-on-scroll');    
//     Route::view('footer-light', 'page-layout.footer-light')->name('footer-light');    
//     Route::view('footer-dark', 'page-layout.footer-dark')->name('footer-dark');    
//     Route::view('footer-fixed', 'page-layout.footer-fixed')->name('footer-fixed');    
// }); 

// Route::view('sample-page', 'pages.sample-page')->name('sample-page');
// Route::view('landing-page', 'pages.landing-page')->name('landing-page');

Route::prefix('others')->group(function () {
    Route::view('400', 'errors.400')->name('error-400');
    Route::view('401', 'errors.401')->name('error-401');
    Route::view('403', 'errors.403')->name('error-403');
    Route::view('404', 'errors.404')->name('error-404');
    Route::view('500', 'errors.500')->name('error-500');
    Route::view('503', 'errors.503')->name('error-503');
});

// Route::prefix('layouts')->group(function () {
//     Route::view('compact-sidebar', 'admin_unique_layouts.compact-sidebar'); //default //Dubai
//     Route::view('box-layout', 'admin_unique_layouts.box-layout');    //default //New York //
//     Route::view('dark-sidebar', 'admin_unique_layouts.dark-sidebar');

//     Route::view('default-body', 'admin_unique_layouts.default-body');
//     Route::view('compact-wrap', 'admin_unique_layouts.compact-wrap');
//     Route::view('enterprice-type', 'admin_unique_layouts.enterprice-type');

//     Route::view('compact-small', 'admin_unique_layouts.compact-small');
//     Route::view('advance-type', 'admin_unique_layouts.advance-type');
//     Route::view('material-layout', 'admin_unique_layouts.material-layout');

//     Route::view('color-sidebar', 'admin_unique_layouts.color-sidebar');
//     Route::view('material-icon', 'admin_unique_layouts.material-icon');
//     Route::view('modern-layout', 'admin_unique_layouts.modern-layout');
// });

// Route::get('/clear-cache', function() {
//     Artisan::call('config:cache');
//     Artisan::call('cache:clear');
//     Artisan::call('config:clear');
//     Artisan::call('view:clear');
//     Artisan::call('route:clear');
//     return "Cache is cleared";
// })->name('clear.cache');