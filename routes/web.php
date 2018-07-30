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


	// Authentication Routes...
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');


	// Registration Routes...
	Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('signup', 'Auth\RegisterController@register');

	// Password Reset Routes...
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset');



/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/





Route::group([ 'middleware'=>['Permission'] ], function() {
	
	Route::group([ 'middleware'=>['auth', 'Role:4'] ], function() {

		Route::resource('/students', 'StudentController');

		Route::any('/reports', 'ReportsController@index')->name('reports');

		Route::any('/all_reports', 'ReportsController@all_reports')->name('all_reports');

		Route::any('/resources/edit', 'ResourcesController@edit')->name('resources.edit');

		Route::any('/calculator-tables', 'CalculatorTablesController@index')->name('calculator-tables');
		
	});
	
	Route::resource('/orders', 'OrderController');
    
	Route::any('/calculator', 'CalculatorController@index')->name('calculator');
		
	Route::any('/analytics', 'AnalyticsController@index')->name('analytics');

	Route::any('/', 'DashboardController@index')->name('dashboard');

	Route::any('/resources', 'ResourcesController@index')->name('resources');
   
}); 


Route::any('/ajax', 'ajaxController@ajax')->name('ajax');

Route::any('/settings', 'SettingsController@index')->name('settings');

\URL::forceScheme('https');
