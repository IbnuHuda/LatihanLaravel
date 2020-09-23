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

Route::get('/', function () { return view('welcome'); })->name('index');
Route::get('/test', function() { return view('test'); });

Route::post('/search/users', 'LiveDataController@searchUsers')->name('searchUsers');

Auth::routes(['verify' => true]);

Route::get('/company-login', 'Auth\CompanyController@loginForm')->name('companyLogin');
Route::post('/company-login', ['as' => 'company-login', 'uses' => 'Auth\CompanyController@login']);

Route::get('/company-register', 'Auth\CompanyController@registerForm')->name('companyRegister');
Route::post('/company-register', 'Auth\CompanyController@register');

Route::get('/company-reset-password', 'Auth\CompanyController@validatePasswordRequestForm')->name('companyEmailValidationForm');
Route::post('/company-reset-password', 'Auth\CompanyController@validatePasswordRequest');

Route::get('{type}/auth/{provider}', 'Auth\SocialiteController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\SocialiteController@handleProviderCallback');

Route::get('/verify/registration', 'Auth\CompanyController@verifyRegister')->name('companyVerifyRegister');
Route::get('/verify/reset-password', 'Auth\CompanyController@resetPasswordForm')->name('companyResetPasswordForm');
Route::post('/verify/reset-password', 'Auth\CompanyController@resetPassword');

Route::group(['middleware' => ['auth', 'verified']], function () {
	Route::get('/users/dashboard', 'HomeController@index')->name('usersDashboard');

	Route::get('/users/profile', 'UsersProfileController@profileForm')->name('usersProfile');
	Route::post('/users/profile', 'UsersProfileController@editProfile')->name('usersEditProfile');
	Route::get('/users/search/{id}', 'UsersProfileController@searchUsers')->name('usersSearch');

	Route::get('/users/job/list', 'UsersJobRegisteredController@listJobsForm')->name('usersListJobs');
	Route::get('/users/job/detail/{id}', 'UsersJobRegisteredController@detailJobsForm')->name('usersDetailJobs');
	Route::get('/users/job/register/{id}', 'UsersJobRegisteredController@registerJobsForm')->name('usersRegisterJobs');
	Route::post('/users/job/register', 'UsersJobRegisteredController@registerJobs');
});

Route::group(['middleware' => ['auth:company']], function () {
	Route::get('/company/dashboard', function () { return view('pages.company.dashboard'); })->name('companyDashboard');

	// Route::get('/company/profile', 'CompanyProfileController@profileForm')->name('companyProfile');
	// Route::get('/company/edit-profile', 'CompanyProfileController@editProfileForm')->name('companyEditProfile');
	// Route::post('/company/edit-profile', 'CompanyProfileController@editProfile');

	Route::get('/company/jobs/list', 'CompanyJobsController@listJobs')->name('companyListJobs');
	Route::get('/company/jobs/detail/{id}', 'CompanyJobsController@detailJobs')->name('companyJobsDetail');
	Route::get('/company/jobs/publish', 'CompanyJobsController@publishForm')->name('companyPublishJobs');
	Route::post('/company/jobs/publish', 'CompanyJobsController@publishJobs');

	Route::get('/company/logout', 'Auth\CompanyController@logout')->name('companyLogout');
});
