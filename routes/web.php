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

Route::get('sessions', 'SessionsController@create')->name('sessions.create');
Route::post('sessions', 'SessionsController@store')->name('sessions.store');
Route::delete('sessions', 'SessionsController@destroy')->name('sessions.destroy');


Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'ResetPasswordController@update');
