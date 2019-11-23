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
use Illuminate\Support\Facades\Route;

// Auth Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Jobs routes
Route::get('/','jobController@index');
Route::get('/alljobs','jobController@jobs')->name('alljobs');
Route::get('/job/{id}','jobController@show')->name('job.show');
Route::post('/job/apply/{id}','jobController@apply')->name('job.apply');

// User Routes
Route::get('user/profile/{id}','UserControlle@profile')->name('user.profile');
Route::post('user/update/{id}','UserControlle@update')->name('user.update');
Route::post('user/resume/{id}','UserControlle@resume')->name('user.resume');
Route::post('user/picture/{id}','UserControlle@picture')->name('user.picture');

// Company Routes
Route::get('/company/jobCreate','CompanyController@jobCreate')->name('company.jobCreate');
Route::get('/company/applicants','CompanyController@applicants')->name('company.applicants');
Route::post('/company/jobStore','CompanyController@jobstore')->name('company.jobStore');

//Employer Register Routes
Route::view('employer/register','auth.emp_register')->name('employer.register');
Route::post('employer/store','EmployerRegisterController@store')->name('employer.store');
