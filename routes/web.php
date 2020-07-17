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
    return view('index');
})->name('index');

Route::get('/update_mode', 'ApiController@update_dark_mode_session');
Route::get('/switch_language', 'ApiController@switch_language')->name('switch_language');
/*
Route::get('/turn_off_popup', 'ApiController@turn_off_popup')->name('turn_off_popup');
Route::get('/turn_off_header', 'ApiController@turn_off_header')->name('turn_off_header');
*/