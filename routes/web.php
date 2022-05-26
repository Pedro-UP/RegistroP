<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
//use App\Http\Controllers\ArticuloController;


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

Route::resource('articulos', '\App\Http\Controllers\ArticuloController')->middleware('auth.admin');

Route::resource('celulares', '\App\Http\Controllers\CelularControler')->middleware('auth.admin');

Route::resource('componentepcs', '\App\Http\Controllers\ComponentesController')->middleware('auth.admin');

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
Route::get('delete/{id}', '\App\Http\Controllers\ArticuloController@delete_item');


Route::get('cart', '\App\Http\Controllers\CelularControler@cart');
Route::get('add-to-cart2/{id}', '\App\Http\Controllers\CelularControler@addToCart');

Route::get('cart', '\App\Http\Controllers\ComponentesController@cart');
Route::get('add-to-cart3/{id}', '\App\Http\Controllers\ComponentesController@addToCart');


Route::get('ventas', '\App\Http\Controllers\VentasController@terminarVenta');

Route::get('/admin', [AdminController::class, 'index'])
->middleware('auth.admin')
->name('admin.index');

// Route::get('/articulos', [ArticuloController::class, 'index'])
// ->middleware('auth.admin')
// ->name('articulos.index');
