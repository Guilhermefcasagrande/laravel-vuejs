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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Define grupo de rotas com prefixo admin
// Ex prefixo: dominio.com.br/prefixo/rota
Route::middleware('auth')->prefix('admin')->namespace('Admin')->group(function(){
    Route::resource('artigos', 'ArtigosController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
