<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/company-login', 'Auth\CompanyController@loginForm')->name('companyLogin');
Route::post('/company-login', [
	'as' => 'company-login',
	'uses' => 'Auth\CompanyController@login'
]);

Route::get('/company-register', 'Auth\CompanyController@registerForm')->name('companyRegister');
Route::post('/company-register', 'Auth\CompanyController@register');

Route::get('{type}/auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::middleware('auth')->group(function () {
	Route::get('/users/dashboard', 'HomeController@index')->name('usersDashboard');
	
	Route::get('/users/profile', 'UsersProfileController@profileForm')->name('usersProfile');
	Route::get('/users/edit-profile', 'UsersProfileController@editProfileForm')->name('usersEditProfile');
	Route::post('/users/edit-profile', 'UsersProfileController@editProfile');
});

Route::middleware('auth:company')->group(function () {
	Route::get('/company-profile', 'Auth\CompanyController@profileForm')->name('companyNewProfile');
	Route::post('/company-profile', 'Auth\CompanyController@profile');

	Route::get('/company/dashboard', function () { return view('pages.company.dashboard'); })->name('companyDashboard');

	Route::get('/company/profile', 'CompanyProfileController@profileForm')->name('companyProfile');
	Route::get('/company/edit-profile', 'CompanyProfileController@editProfileForm')->name('companyEditProfile');
	Route::post('/company/edit-profile', 'CompanyProfileController@editProfile');
});