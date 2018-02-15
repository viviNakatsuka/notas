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

Route::get('/hnotas', function () {
    return view('notas');
});

/*Route::get('/', function () {
    return 'hola mundo notas!!';
});*/

Route::resource('users', 'UserController');
Route::resource('notas', 'NotaController');