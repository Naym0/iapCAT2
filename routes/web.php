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
    return view('Muswanya/home');
});
Route::get('/student', 'StudentController@student');
Route::post('/insert', 'StudentController@insert');
Route::get('/fees', 'FeesController@fees');
Route::post('/store', 'FeesController@store');
Route::post('/onestudent', 'StudentController@onestudent');
Route::get('/allfees', 'FeesController@allfees');
