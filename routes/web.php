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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/files/create','DocumentController@create');
Route::post('/files','DocumentController@store');
Route::get('/files','DocumentController@index');
Route::get('/files/{id}','DocumentController@show');
Route::get('/file/download/{file}','DocumentController@download');
Route::post('/uploadfile','DocumentController@store1');