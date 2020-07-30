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
Route::resource('Calpro', 'CalproController');
Route::resource('Modelcal', 'ModelcalController');
Route::resource('Category', 'CategoryController');
Route::resource('Product', 'ProductController');
Route::get('/search' ,'ProductController@search');
Route::get('/report' ,'OrderController@report');

Route::get('/dashboard' ,'OrderController@dashboard');