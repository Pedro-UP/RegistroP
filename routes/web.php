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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', '\App\Http\Controllers\InicioController@index');

Route::resource('articulos', '\App\Http\Controllers\ArticuloController');

Route::resource('celulares', '\App\Http\Controllers\CelularControler');

Route::resource('componentepcs', '\App\Http\Controllers\ComponentesController');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::resource('dashboard', '\App\Http\Controllers\DashboardController');
});


Route::resource('detalles', '\App\Http\Controllers\ArticuloController');
Route::resource('detalles2', '\App\Http\Controllers\CelularControler');
Route::resource('detalles3', '\App\Http\Controllers\ComponentesController');

//Route::resource('dashboard', '\App\Http\Controllers\DashboardController');

Route::get('cart', '\App\Http\Controllers\ArticuloController@cart');

Route::get('add-to-cart1/{id}', '\App\Http\Controllers\ArticuloController@addToCart');

Route::get('cart', '\App\Http\Controllers\CelularControler@cart');

Route::get('add-to-cart2/{id}', '\App\Http\Controllers\CelularControler@addToCart');

Route::get('cart', '\App\Http\Controllers\ComponentesController@cart');

Route::get('add-to-cart3/{id}', '\App\Http\Controllers\ComponentesController@addToCart');

