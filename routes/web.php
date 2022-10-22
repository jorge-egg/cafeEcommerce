<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/',[App\Http\Controllers\incio::class, 'index'])->name('inicio');
Route::get('/crema',[App\Http\Controllers\crema::class, 'index'])->name('crema');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

//rutas de administrador

Route::resource('users', UserController::class)->names('admin.users');
Route::resource('products', 'ProductController')->names('admin.categories.products');

//Rutas del administrador

Route::get('/productos', [App\Http\Controllers\ProductosController::class, 'index'])->name('producto.index');
Route::post('/productosCrear', [\App\Http\Controllers\ProductosController::class, 'store'])->name('cliente.create');

//Rutas del carrito
Route::post('/agregar/{idProducto}', [App\Http\Controllers\carritoController::class, 'agregar'])->name('agregar');
Route::post('/modificar/{idProducto}', [App\Http\Controllers\carritoController::class, 'modificar'])->name('modificar');
Route::get('/carrito', [App\Http\Controllers\carritoController::class, 'mostrar'])->name('mostrar');
route::delete('/eliminar/{idCarrito}', [App\Http\controllers\carritoController::class, 'eliminar'])->name('eliminar');
