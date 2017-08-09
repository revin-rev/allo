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
/*Route::get('/', function () {
    return view('welcome');
});*/

 // Auth Get Routes
    Route::get('/', 'AccountController@Index');
    Route::any('/user/mpd_settings', 'UserController@mpdSettings');
    Route::any('/user/system_settings', 'UserController@systemSettings');
    Route::any('/ssh-login', 'AccountController@ssh_login');
    Route::any('/user/changeMpdSettings', 'UserController@changeMpdSettings');
    
   
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
