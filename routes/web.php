<?php

use GuzzleHttp\Psr7\Request;
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

Route::middleware(['auth', 'verified'])->group(function () {
	Route::get('/users/dashboard', 'HomeController@index')->name('usersDashboard');

	Route::get('/users/profile', 'UsersProfileController@profileForm')->name('usersProfile');
	Route::post('/users/profile', 'UsersProfileController@editProfile');
	Route::get('/users/search/{id}', 'UsersProfileController@searchUsers')->name('usersSearch');

	Route::get('/users/team/create', 'TeamProfileController@createTeamForm')->name('usersCreateTeam');
	Route::post('/users/team/create', 'TeamProfileController@createTeam');
    Route::get('/users/team/profile', 'TeamProfileController@profileTeamForm')->name('usersProfileTeam');
    Route::post('/users/team/join', 'TeamProfileController@joinTeam')->name('usersJoinTeam');
    Route::post('/users/team/joined', 'TeamProfileController@joinedTeam');

	Route::get('/users/job/list', 'UsersJobRegisteredController@listJobsForm')->name('usersListJobs');
	Route::get('/users/job/detail/{id}', 'UsersJobRegisteredController@detailJobsForm')->name('usersDetailJobs');
    Route::get('/users/job/register/{id}', 'UsersJobRegisteredController@registerJobsForm')->name('usersRegisterJobs');
	Route::post('/users/job/register', 'UsersJobRegisteredController@registerJobs')->name('usersJobsRegister');
});

Route::middleware('auth:company')->group(function () {
	Route::get('/company/dashboard', 'CompanyDashboardController@home')->name('companyDashboard');

	Route::get('/company/company-profile', 'CompanyProfileController@companyProfileForm')->name('companySelfProfile');
	Route::post('/company/company-profile', 'CompanyProfileController@companyProfile');
	Route::get('/company/profile', 'CompanyProfileController@profileForm')->name('companyProfile');
	Route::post('/company/profile', 'CompanyProfileController@editProfile');

	Route::get('/company/jobs/my-jobs', 'CompanyJobsController@myJobs')->name('myCompanyJobs');
	Route::get('/company/jobs/list', 'CompanyJobsController@listJobs')->name('companyListJobs');
	Route::get('/company/jobs/detail/{id}', 'CompanyJobsController@detailJobs')->name('companyJobsDetail');
	Route::get('/company/jobs/publish', 'CompanyJobsController@publishForm')->name('companyPublishJobs');
	Route::post('/company/jobs/publish', 'CompanyJobsController@publishJobs');

	Route::get('/company/step/submission', 'CompanyJobStepController@submissionForm')->name('companyStepSubmission');
	Route::get('/company/step/submission/{id}', 'CompanyJobStepController@submissionDetailForm')->name('companyStepDetailSubmission');
	Route::post('/company/step/submission', 'CompanyJobStepController@submissionProcess');
	Route::get('/company/step/assesment', 'CompanyJobStepController@assesmentForm')->name('companyStepAssesment');
	Route::get('/company/step/assesment/{id}', 'CompanyJobStepController@assesmentDetailForm')->name('companyStepDetailAssesment');
	Route::post('/company/step/assesment', 'CompanyJobStepController@assesmentProcess');
	Route::get('/company/step/approval', 'CompanyJobStepController@approvalForm')->name('companyStepApproval');

	Route::get('/company/logout', 'Auth\CompanyController@logout')->name('companyLogout');
});
