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

Route::get('/', 'HomeController@inicio');

Auth::routes();

Route::get('/home', 'HomeController@inicio');
Route::post('/add-brand', 'BrandController@store');
Route::post('/add-car', 'ModeloController@store');
Route::get('/delete-car/{id}', 'ModeloController@destroy');
Route::get('/delete-brand/{id}', 'BrandController@destroy');
Route::get('/edit-car/{id}', 'ModeloController@edit');
Route::post('/edit-car/{id}', 'ModeloController@update');
Route::get('/edit-brand/{id}', 'BrandController@edit');
Route::post('/edit-brand/{id}', 'BrandController@update');
