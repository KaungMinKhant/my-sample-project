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
// Authenication Route
Auth::routes(['verify' => true]);

// Auth Index Route
Route::get('user', 'UserController@index')->middleware('verified');

// Home Page Route
Route::get('/', 'PagesController@index')->middleware('verified');

//Login Route
Route::get('/admin', 'AdminController@index')->name('admin');

// Logout Route
Route::get('logout', function(){
	auth()->logout();
	return view('auth.login');
});

//Privacy
Route::get('privacy', 'PagesController@privacy');
//Terms of Service
Route::get('terms-of-service', 'PagesController@terms');

// Test Route
Route::get('test', 'TestController@index')->middleware('verified');

// Widget Route
Route::get('widget/create', 'WidgetController@create')->name('widget.create');
Route::get('widget/{widget}-{slug?}',
	'WidgetController@show')
->name('widget.show');
Route::resource('widget', 'WidgetController');






