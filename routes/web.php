<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Imagen;
use App\Models\User;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('imagen',App\Http\Controllers\ImagenController::class);
Route::resource('like',App\Http\Controllers\LikeController::class);


// Route::get('comentarios/create/{imagen}/{usuario}',[App\Http\Controllers\ComentarioController::class,'create'])->name('comentarios.create');
Route::post('comentarios',[App\Http\Controllers\ComentarioController::class,'store'])->name('comentarios.store');

Route::post('imagen/{imagen}/edit', [App\Http\Controllers\ImagenController::class, 'edit'])->name('imagenes.editar');
Route::put('imagen/{imagen}', [App\Http\Controllers\ImagenController::class, 'update',])->name('imagenes.update');
Route::post('imagenes/subir/{usuario}',[App\Http\Controllers\ImagenController::class,'create'])->name('imagenes.subir');