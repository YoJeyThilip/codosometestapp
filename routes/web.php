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



Route::any('/logout', 'DashboardController@logout')->name('logout');


Auth::routes();

Route::any('/calculator', 'CalculatorController@index')->name('calculator');

Route::resource('/orders', 'OrderController');

Route::any('/all_paid_orders', 'ReportsController@all_paid_orders')->name('all_paid_orders');

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/


Route::group([ 'middleware'=>['auth', 'Role:4'] ], function() {

	Route::resource('/students', 'StudentController');

	Route::any('/reports', 'ReportsController@index')->name('reports');
	
	
});

Route::any('/settings', 'SettingsController@index')->name('settings');

Route::any('/ajax', 'ajaxController@ajax')->name('ajax');

Route::any('/', 'DashboardController@index')->name('dashboard');
