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
Route::get('/register', 'App\Http\Controllers\RegisterController@index')->name('register');
Route::post('/register/post', 'App\Http\Controllers\RegisterController@post')->name("postRegist");
Route::get('/balance', 'App\Http\Controllers\BalanceController@index')->name('prepaidBalance');
Route::post('/balance/post', 'App\Http\Controllers\BalanceController@post')->name("postBalance");
Route::get('/product', 'App\Http\Controllers\ProductController@index')->name('product');
Route::post('/product/post', 'App\Http\Controllers\ProductController@post')->name("postProduct");
Route::get('/product/{id}', 'App\Http\Controllers\ProductController@successOrder')->name('successOrder');
Route::get('/pay/{id}', 'App\Http\Controllers\ProductController@pay')->name('payProduct');
Route::post('/pay/process', 'App\Http\Controllers\ProductController@payProcess')->name('payProcess');