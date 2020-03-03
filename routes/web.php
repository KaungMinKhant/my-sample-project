<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
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


// Home Page Route
Route::get('/', 'PagesController@index')->middleware('verified');

//Login Route
Route::get('/admin', 'AdminController@index')->name('admin');

// Logout Route
Route::get('logout', function(){
	auth()->logout();
	return view('auth.login');
});

Route::resource('profile', 'ProfileController');
Route::resource('user', 'UserController');

Route::get('show-profile',
'ProfileController@showProfileToUser')->name('show-profile');
Route::get('determine-profile-route',
'ProfileController@determineProfileRoute')
->name('determine-profile-route');
Route::resource('profile', 'ProfileController');
Route::get('settings', 'SettingsController@edit');
Route::post('settings', 'SettingsController@update')
->name('user-update');
Route::resource('marketing-image', 'MarketingImageController');
//Privacy
Route::get('privacy', 'PagesController@privacy');

//Socialite Implementation
/*Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');*/
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');
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






