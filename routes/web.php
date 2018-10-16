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
Route::get('user', 'Auth\RegisterController@index')->middleware('verified');

// Home Page Route
Route::get('/', 'PagesController@index')->middleware('verified');

// Logout Route
Route::get('logout', function(){
	auth()->logout();
	return view('auth.login');
});

// Test Route
Route::get('test', 'TestController@index')->middleware('verified');

// Widget Route
Route::resource('widget', 'WidgetController');






