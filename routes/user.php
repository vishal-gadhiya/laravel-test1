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

Route::group(['as' => 'user.'], function() {

	// Dashboard
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	// Profile
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::post('/profile', 'ProfileController@store')->name('profile.store');

	// Blog
	Route::resource('blogs', 'BlogController');
});