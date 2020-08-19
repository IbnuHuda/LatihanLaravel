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

Route::get('/company-login', 'Auth\CompanyLoginController@loginForm')->name('companyLogin');
Route::post('/company-login', [
	'as' => 'company-login',
	'uses' => 'Auth\CompanyLoginController@login'
]);

Route::get('{type}/auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::middleware('auth:web')->group(function () {
	Route::get('/users/dashboard', 'HomeController@index')->name('users.home');
});

Route::middleware('auth:company')->group(function () {
	Route::get('/company/dashboard', function () { return view('pages.company.dashboard'); });
});