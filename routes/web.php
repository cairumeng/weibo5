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
});

Route::resource('users', 'UsersController');

Route::get('users/activate/{token}', 'UsersController@activate')->name('users.activate');

Route::resource('sessions', 'SessionsController')->only(['create', 'store', 'destroy']);
