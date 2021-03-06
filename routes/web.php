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
    return view('static_pages.welcome');
})->name('home');

Route::resource('users', 'UsersController');

Route::get('users/activate/{token}', 'UsersController@activate')->name('users.activate');
Route::post('users/uploadAvatar', 'UsersController@uploadAvatar')->name('users.uploadAvatar');
Route::get('sessions', 'SessionsController@create')->name('sessions.create');
Route::post('sessions', 'SessionsController@store')->name('sessions.store');
Route::delete('sessions', 'SessionsController@destroy')->name('sessions.destroy');


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::post('statuses/store', 'StatusesController@store')->name('statuses.store');
Route::delete('statuses/{status}', 'StatusesController@destroy')->name('statuses.destroy');

Route::get('users/{user}/followers', 'UsersController@followers')->name('users.followers');
Route::get('users/{user}/followings', 'UsersController@followings')->name('users.followings');

Route::post('followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('followers/{user}', 'FollowersController@destroy')->name('followers.destroy');
