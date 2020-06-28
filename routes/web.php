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

Route::get('/', 'TickerController@ticker');
Route::get('/stats', 'StatisticsController@home');
Route::post('/stats', ['as' => 'statsPost', 'uses' => 'StatisticsController@stats']);
