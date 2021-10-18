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

Route::get('/', function() { return view('welcome'); });

# 個別ルーティング
//Route::get('/blogs', 'BlogController@index');

Route::resource('blogs', 'BlogController');

if(env('APP_ENV') === 'local') URL::forceScheme('https');