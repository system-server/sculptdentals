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

Route::get('/', function(){
	return view('login.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('inicio');

Route::resource('users', 'Web\UsersController');
Route::resource('doctors', 'Web\DoctorsController');
Route::resource('services', 'Web\ServicesController');
Route::resource('treatments', 'Web\TreatmentsController');
Route::resource('recipes', 'Web\RecipesController');
Route::resource('quotes', 'Web\QuotesController');
Route::resource('packages', 'Web\PackagesController');
//quotes extras
Route::post('get_customer', 'Web\Extras\QuotesController@getCustomer')->name('get_customer');
Route::post('get_quotes', 'Web\Extras\QuotesController@getQuotes')->name('get_quotes');
Route::get('doctor_calendar', 'Web\Extras\QuotesController@doctorCalendar')->name('doctor_calendar');
//packages
Route::post('add_package', 'Web\Extras\PackagePaymentController@addPackage')->name('add_package');
Route::post('get_packages', 'Web\Extras\PackagePaymentController@getPackages')->name('get_packages');
Route::post('store_payment_package', 'Web\Extras\PackagePaymentController@storePaymentPackage')->name('store_payment_package');
Route::get('get_payment_package/{id}', 'Web\Extras\PackagePaymentController@getPackagePayment')->name('get_payment_package');
Route::put('update_payment_package/{id}', 'Web\Extras\PackagePaymentController@updatePackagePayment')->name('update_payment_package');
Route::delete('delete_payment_package/{id}', 'Web\Extras\PackagePaymentController@deletePackagePayment')->name('delete_payment_package');
