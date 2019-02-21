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
Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/profile', 'UserController@profileCreate');
Route::get('/dashboard', 'ActionsController@index')->middleware(['auth:web', 'role:teacher']);
Route::get('/lessons', 'LessonsController@index');