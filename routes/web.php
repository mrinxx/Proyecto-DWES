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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', function () {
    $images = Imagen::all();
    foreach($images as $image){
    echo "<br>".$image->ruta_imagen;
    echo "<br>".$image->desccripcion;
    echo "<br>".$image->usuario->nombre." ".$image->usuario->apellido;
    //Si la imagen tiene asociado algun comentario
if(count($image->comentarios) >= 1){
    echo '<h4>Comentarios:</h4>';
    foreach($image->comments as $comment){
    echo "#>".$comment->user->name.' '.$comment->user->surname.":";
    echo $comment->content."<br>";
    }
   }
   echo "<hr>";
   }
   //return view('welcome');
   });
