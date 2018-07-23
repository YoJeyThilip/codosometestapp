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

Route::any('/tables', 'tablesController@index')->name('tables');


/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/


Route::group([ 'middleware'=>['auth', 'Role:4'] ], function() {

	Route::resource('/students', 'StudentController');

	Route::any('/reports', 'ReportsController@index')->name('reports');
	
	Route::any('/analytics', 'AnalyticsController@index')->name('analytics');

	Route::any('/all_reports', 'ReportsController@all_reports')->name('all_reports');

	Route::any('/resources/edit', 'ResourcesController@edit')->name('resources.edit');
	
});

Route::any('/settings', 'SettingsController@index')->name('settings');

Route::any('/ajax', 'ajaxController@ajax')->name('ajax');

Route::any('/', 'DashboardController@index')->name('dashboard');

Route::any('/resources', 'ResourcesController@index')->name('resources');

\URL::forceScheme('https');
