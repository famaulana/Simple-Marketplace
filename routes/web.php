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

Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/login/post', 'App\Http\Controllers\LoginController@post')->name("postLogin");
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name("logout");
Route::get('/', 'App\Http\Controllers\RegisterController@index')->name('register');
Route::post('/register/post', 'App\Http\Controllers\RegisterController@post')->name("postRegist");