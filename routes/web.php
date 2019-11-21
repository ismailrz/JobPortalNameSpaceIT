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

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Employer Register Routes
Route::view('employer/profile','auth.emp_register')->name('employer.register');
Route::post('employer/store','EmployerRegisterController@store')->name('employer.store');
