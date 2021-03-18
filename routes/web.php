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

Route::get('/register', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::post('account','HomeController@post')->name('post');
Route::get('/','HomeController@root');
Route::get('delete/payload','HomeController@delete_payload')->name('delete.payload');
Route::get('delete/account/{id}','HomeController@account_payload')->name('delete.account');

Route::post('meta','HomeController@meta')->name('meta');