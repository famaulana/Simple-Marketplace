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
    return view('pages.register');
})->name('register');
Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::post('/login/post', 'App\Http\Controllers\LoginController@post')->name("postLogin");
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name("logout");
Route::post('/register/post', 'RegisterController@post')->name("postRegist");