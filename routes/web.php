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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* TRANSACCIONES */
/*Usa los recursos básicos del controlador de transacciones, para usarlo es necesario colocar transaction.funcion, donde "funcion" solo sirve si es una función predeterminada EJ: create, edit, etc.*/
Route::resource('transaction', 'TransactionController');

/* FIN TRANSACCIONES */