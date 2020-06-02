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

Route::get('/test', 'ImageController@index');
Route::post('/test', 'ImageController@store');
Route::get('/test/{image}', 'ImageController@show');

Route::get('/', 'WelcomeController@index');
Route::resource('images', 'WelcomeController', ['only' => ['store', 'destroy']]);
